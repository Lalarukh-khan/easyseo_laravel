<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Editor;
use App\Models\EditorSeoScore;
use App\Models\EditorTargetKeyword;
use Illuminate\Support\Facades\DB;
use App\Models\GptHistory;
use App\Models\Setting;
use App\Models\UserPackage;
use Illuminate\Support\Str;


class EditorController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

		if (request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $editors = new Editor();
            
			$editors = Editor::get(['editor.*', DB::raw('@rownum  := @rownum  + 1 AS rownum')])->where('user_id' , $user_id);
			return Datatables::of($editors)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('score', function ($row) {
                    return $row->score;
                })
                ->addColumn('target_keyword', function ($row) {
                    return $row->target_keyword;
                })
                // ->addColumn('target_keyword', function ($row) {
                //     $editor_id = $row->id;
                //     $target_keyword = EditorTargetKeyword::get('editor_target_keyword.*')->where('editor_id' , $editor_id)->pluck('name');
                //     $string = str_replace(array('["','"]'),'',$target_keyword);
                //     return $string;
                // })
                // ->addColumn('score', function ($row) {
                //     $editor_id = $row->id;
                //     $score = EditorSeoScore::get('editor_seo_score.*')->where('editor_id' , $editor_id)->pluck('score');
                //     $string = str_replace(array('[',']'),'',$score);
                //     return $string;
                // })
                ->addColumn('words', function ($row) {
                    return $row->words;
                })
                ->addColumn('status', function ($row) {
                    return $row->status;
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('user.editor.document',$row->id).'" style="font-size:20px;"><i class="fadeIn animated bx bx-edit"></i></a>';
                })
                // ->addColumn('action', function ($row) {
                //     return view('front.editor.document')->with(['data' => $row])->render();
                // })
                ->rawColumns(['name', 'target_keyword', 'score', 'words', 'status', 'action'])
                ->make(true);
        }   

        $data = array(
            'title' => 'Editor'
        );
        return view('front.editor.index')->with($data);
    }

    public function create()
    {
        $row = Editor::create();
        
        $data = array(
            'title' => 'Create Document',
            'e_id' => $row->id
        );
        return view('front.editor.create')->with($data);
    }

    public function document($id)
    {
        $data = array(
        'title' => 'Editor',
        'data' => Editor::findOrFail($id),
        );
        return view('front.editor.document')->with($data);
    }

    public function saveEditor(Request $request)
    {
        $editor = Editor::findOrFail($request->e_id);
        $auth_user = auth('web')->user();

        $editor->user_id = $auth_user->id;
        $editor->name = $request->edtitle;
        $editor->description = $request->eddesc;
        $editor->words = $request->edwords;
        $editor->status = "Draft";
        $editor->score = $request->edscrore;
        $editor->target_keyword = $request->edtrgtkw;
        $editor->semantics = $request->edsemantics;
        $editor->questions = $request->edquestions;
        $editor->titles = $request->edalltitles;
        // Save the changes
        $editor->save();
    }
    public function changeEditor(Request $request)
    {
        $editor = Editor::findOrFail($request->e_id);

        $editor->name = $request->edtitle;
        $editor->description = $request->eddesc;
        $editor->words = $request->edwords;
        $editor->score = $request->edscrore;
        // Save the changes
        $editor->save();
    }

    public function keywords()
    {
        $text = "Hello ".auth('web')->user()->full_name.", how can I help you?";
        $old_prompt = array(
            array(
                'role' => 'assistant',
                "content" =>$text ,
            ),
            array(
                'role' => 'user',
                "content" => 'Act as a customer support chatbot named Easyseo. you are friendly, helpful and funny.' ,
            ),
            array(
                'role' => 'assistant',
                "content" => 'Hello there! Welcome to the Easyseo customer support. How can I assist you today?' ,
            ),
        );
        $data = array(
            'title' => 'AI Keywords',
            // 'title' => $title,
            'old_prompt' => $old_prompt,
            'text' => "Hello there! Welcome to the Easyseo customer support. How can I assist you today?",
        );
        return view('front.editor.keywords')->with($data);
    }

    public function ai_response(Request $request)
    {
        // checking remaining words start

        $user_package = UserPackage::where('user_id',auth('web')->id())->latest()->first();
        $userPackageWords = $user_package->words;

        $From = $user_package->start_date;
        $currentDate = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime(' +1 day'));
        $end_date = strtotime($user_package->end_date);

        $used_words = GptHistory::where([ ['user_id',auth('web')->id()] ])->whereBetween('created_at', [$From,$tomorrow])->sum('total_words');

        if (strtotime($currentDate) > $end_date && $used_words >= $userPackageWords) {
            return response()->json(['error' => __('error_msg.word_limit_reached')]);
        }elseif (strtotime($currentDate) > $end_date) {
            return response()->json(['error' => __('error_msg.word_limit_reached')]);
        }elseif ($used_words >= $userPackageWords) {
            return response()->json(['error' => __('error_msg.word_ended')]);
        }
        // checking remaining words end

        $setting = Setting::latest()->first();
        $api_key = !empty($setting) ? base64_decode($setting::latest()->first()->api_key) : null;

        $user = auth('web')->user();

        $old_prompt = json_decode($request->old_prompt);
        $old_prompt[] = array(
            'role' => 'user',
            "content" => $request->prompt,
        );
        $res = $this->get_response($old_prompt,$api_key);

        $save_res = json_decode(json_encode($res));
        
        if ($save_res->original->status == 400) {
            $msg = [
                'status' => 400,
                'message' => $save_res->original->message,
            ];
            return response()->json($msg,400);
        }
        $msg = [
            'status' => 200,
            'bot' => $save_res->original->bot,
            'old_prompt' => $save_res->original->old_prompt,
        ];

        return response()->json($msg);
        // return $res;
    }

    public function get_response($prompt, $api_key)
    {
        $client = \OpenAI::client($api_key);

        $post_array = array(
            'model'  => 'gpt-3.5-turbo',
            'messages'  => $prompt,
        );

        $result = $client->chat()->create($post_array);

        $msg = [
            'status' => 200,
            'bot' => $result->choices[0]->message->content,
            'usage' => $result->usage,
            'old_prompt' => json_encode($prompt),
        ];

        return response()->json($msg);
    }
}
