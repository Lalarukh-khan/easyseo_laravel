<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GptHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $authUserId = session()->get('authUserId');

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

            $hisotry = $hisotry->where('user_id', $authUserId)->where('type','!=','chatbot')->orderBy('id', 'DESC')->get([
                'gpt_histories.*',
                DB::raw('@rownum  := @rownum  + 1 AS rownum')
            ]);
            return DataTables::of($hisotry)
                ->addIndexColumn()
                ->addColumn('time', function ($row) {
                    return view('front.history.action')->with(['data' => $row])->render();
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
            'title' => 'History',
        );

        return view('front.history.index')->with($data);
    }
}
