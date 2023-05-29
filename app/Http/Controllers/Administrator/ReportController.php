<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\GptHistory;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class ReportController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $hisotry = new GptHistory();

            if (isset($request->daterange) && !empty($request->daterange)) {
                $daterage = explode(' - ', $request->daterange);
                $dateS = new Carbon($daterage[0]);
                $dateE = new Carbon($daterage[1]);
                $hisotry = $hisotry->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);
            }

            $hisotry = $hisotry->where('type','!=','chatbot')->orderBy('id', 'DESC')->get([
                'gpt_histories.*',
                DB::raw('@rownum  := @rownum  + 1 AS rownum')
            ]);
            return Datatables::of($hisotry)
                ->addIndexColumn()
                ->addColumn('time', function ($row) {
                    // return $row->created_at->diffForHumans();
                    return view('admin.report.action')->with(['data' => $row])->render();
                })
                ->addColumn('type', function ($row) {
                    return $row->type == 'template' ? 'Template' : 'AI Assistant';
                })
                ->addColumn('result', function ($row) {
                    $result = '';
                    if ($row->type == 'complete') {
                        $text = $row->prompt . ' ' . $row->answer;
                        $result =  substr($text, 0, 50) . '...';
                    }
                    if ($row->type == 'template') {
                        $result =  $row->template_name ?? 'Template';
                    } else {
                        $text = $row->prompt . ' ' . $row->answer;
                        $result =  substr($text, 0, 50) . '...';
                    }
                    return $result;
                })
                ->addColumn('words', function ($row) {
                    return $row->total_words;
                })
                ->addColumn('user_name', function ($row) {
                    return '<a data-url="' . route('admin.report.user-requests',['id'=>$row->user->hashid]) . '" target="_blank">' . $row->user->full_name . '</a>';
                })
                ->rawColumns(['time', 'result', 'words', 'user_name', 'type'])
                ->make(true);
        }

        $data = array(
            'title' => 'Requests Report',
        );

        return view('admin.report.request_reports')->with($data);
    }

    public function user_requests(Request $request)
    {
        if (request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $hisotry = new GptHistory();

            if (isset($request->daterange) && !empty($request->daterange)) {
                $daterage = explode(' - ', $request->daterange);
                $dateS = new Carbon($daterage[0]);
                $dateE = new Carbon($daterage[1]);
                $hisotry = $hisotry->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);
            } else {
                $hisotry = $hisotry->whereMonth('created_at', Carbon::now()->month);
            }

            $hisotry = $hisotry->where('user_id', hashids_decode($request->id))->where('type','!=','chatbot')->orderBy('id', 'DESC')->get([
                'gpt_histories.*',
                DB::raw('@rownum  := @rownum  + 1 AS rownum')
            ]);
            return Datatables::of($hisotry)
                ->addIndexColumn()
                ->addColumn('time', function ($row) {
                    return view('admin.report.action')->with(['data' => $row])->render();
                })
                ->addColumn('type', function ($row) {
                    return $row->type == 'template' ? 'Template' : 'AI Assistant';
                })
                ->addColumn('result', function ($row) {
                    $result = '';
                    if ($row->type == 'complete') {
                        $text = $row->prompt . ' ' . $row->answer;
                        $result =  substr($text, 0, 50) . '...';
                    }if($row->type == 'template'){
                        $result =  $row->template_name ?? 'Template';
                    }else{
                        $text = $row->prompt . ' ' . $row->answer;
                        $result =  substr($text, 0, 50) . '...';
                    }
                    return $result;
                })
                ->addColumn('words', function ($row) {
                    return $row->total_words;
                })
                ->rawColumns(['time','type', 'result', 'words'])
                ->make(true);
        }

        $data = array(
            'title' => 'Single User Report',
            'user_id' => $request->id,
            'user_info' => User::hashidFind($request->id)
        );

        return view('admin.report.single_user')->with($data);
    }


    public function get_report(Request $request)
    {
        if (request()->ajax()) {
            $hisotry = new GptHistory();
            $typeQuery1 = new GptHistory;
            $typeQuery2 = new GptHistory;
            $typeQuery3 = new GptHistory;

            if (isset($request->daterange) && !empty($request->daterange)) {
                $daterage = explode(' - ', $request->daterange);
                $dateS = new Carbon($daterage[0]);
                $dateE = new Carbon($daterage[1]);
                $hisotry = $hisotry->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);

                $typeQuery1 = $typeQuery1->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);
                $typeQuery2 = $typeQuery2->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);

                $typeQuery3 = $typeQuery3->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);

            }

            if (isset($request->id) && !empty($request->id)) {
                $hisotry = $hisotry->where('user_id', hashids_decode($request->id));
                $userPackage = UserPackage::where('user_id', hashids_decode($request->id))->latest()->first();

                $typeQuery1 = $typeQuery1->where('user_id', hashids_decode($request->id));
                $typeQuery2 = $typeQuery2->where('user_id', hashids_decode($request->id));
                $typeQuery3 = $typeQuery3->where('user_id', hashids_decode($request->id));
            }

            // condition for remain words
            if ($hisotry->sum('total_words') > 0) {
                if (isset($userPackage) && isset($userPackage->words)) {
                    $remain_words =  $userPackage->words - $hisotry->sum('total_words');
                    if ($remain_words < 0) {
                        $remain_words = 0;
                    }

                    if ($hisotry->sum('total_words') > $userPackage->words) {
                        $total_words = $userPackage->words;
                    }else{
                        $total_words = $hisotry->sum('total_words') ?? 0;
                    }
                }else{
                    $remain_words = $userPackage->words ?? 5000;
                    $total_words = $hisotry->sum('total_words') ?? 0;
                }

            }else{
                $total_words = 0;
            }



            return response()->json([
                'total_req' => $hisotry->count() > 0 ? $hisotry->count() : 0,
                // 'total_words' => $hisotry->sum('total_words') > 0 ? $hisotry->sum('total_words') : 0,
                // 'remain_words' => $hisotry->sum('total_words') > 0 ? (isset($userPackage) && isset($userPackage->words) ? $userPackage->words : 5000) - $hisotry->sum('total_words') : 5000,
                'ai_assistants' => $typeQuery2->where('type', '!=', 'template')->count(),
                'total_words' => $total_words,
                'remain_words' => $remain_words,
                'templates' => $typeQuery1->where('type', 'template')->count(),
                'chatbot' => $typeQuery1->where('type', 'chatbot')->count(),
            ]);
        }
    }
}
