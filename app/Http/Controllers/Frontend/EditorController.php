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
use Exception;


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
                ->addColumn('words', function ($row) {
                    return $row->words;
                })
                // ->addColumn('status', function ($row) {
                //     return $row->status;
                // })
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('user.editor.document',$row->id).'" style="font-size:20px;"><i class="fadeIn animated bx bx-edit"></i></a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="ajaxRequest(this)" data-url="'.route('user.editor.delete',$row->id).'" class="text-danger" title="delete" style="font-size:20px;"><i class="fadeIn animated bx bx-trash"></i></a>&nbsp;&nbsp;';
                })
                //  data-url="{{route('admin.template.delete',$data->hashid)}}" 
                // ->addColumn('action', function ($row) {
                //     return view('front.editor.document')->with(['data' => $row])->render();
                // })
                ->rawColumns(['name', 'target_keyword', 'score', 'words', 'action'])
                ->make(true);
        }

        $data = array(
            'title' => 'Editor'
        );
        return view('front.editor.index')->with($data);
    }
    public function delete($id)
    {
        // $editor = Editor::findOrFail($id);
        // $editor->delete();
        try {
            $editor = Editor::findOrFail($id);
            $editor->delete();
        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json([
            'success' => 'Document deleted Successfully Test',
            'reload' => true,
        ]);
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
        $authUser = session()->get('authUser');

        // $user_package = UserPackage::where('user_id',auth('web')->id())->latest()->first();
        $user_package = session()->get('UserPackages');

        $userPackageWords = $user_package->words;

        $From = $user_package->start_date;
        $currentDate = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime(' +1 day'));
        $end_date = strtotime($user_package->end_date);

        // $used_words = GptHistory::where([ ['user_id',$authUser->user_type == 'workspace' ? $authUser->main_user_id : $authUser->main_user_id] ])->whereBetween('created_at', [$From,$tomorrow])->sum('total_words');
        $used_words = session()->get('gpt_words');

        $remaining_words = $userPackageWords - $used_words;

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

        // $user = auth('web')->user();

        $old_prompt = json_decode($request->old_prompt);
        $old_prompt[] = array(
            'role' => 'user',
            "content" => $request->prompt,
        );
        $model = $request->model;
        $res = $this->get_response($old_prompt,$api_key, $model);

        $save_res = json_decode(json_encode($res));

        if ($save_res->original->status == 400) {
            $msg = [
                'status' => 400,
                'message' => $save_res->original->message,
            ];
            return response()->json($msg,400);
        }

        $gpt_answer = removeFirstTwoBrTags($save_res->original->bot);
        if (str_word_count($gpt_answer) >= $remaining_words) {
            $gpt_answer = limitWords($gpt_answer,$remaining_words);
            $total_words = str_word_count($gpt_answer);
        }else{
            $total_words = str_word_count($gpt_answer);
        }

        $gpt_history = new GptHistory();
        $gpt_history->type = 'editor';
        $gpt_history->user_id = $authUser->id;
        $gpt_history->prompt = $request->prompt;
        $gpt_history->answer = $gpt_answer;
        $gpt_history->prompt_tokens = $save_res->original->usage->promptTokens;
        $gpt_history->completion_tokens = $save_res->original->usage->completionTokens;
        $gpt_history->total_tokens = $save_res->original->usage->totalTokens;
        $gpt_history->total_words = $total_words;
        $gpt_history->save();

        $msg = [
            'status' => 200,
            'bot' => $gpt_answer,
            'old_prompt' => $save_res->original->old_prompt,
        ];

        return response()->json($msg);
        // return $res;
    }

    public function get_response($prompt, $api_key, $model)
    {
        $client = \OpenAI::client($api_key);

        $post_array = array(
            // 'model'  => 'gpt-3.5-turbo',
            // 'model' => 'gpt-3.5-turbo-0613',
            'model' => $model,
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
