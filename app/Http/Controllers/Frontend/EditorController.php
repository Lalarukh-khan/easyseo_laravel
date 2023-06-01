<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Editor;
use App\Models\EditorTargetKeyword;
use App\Models\EditorSeoScore;
use Illuminate\Support\Facades\DB;

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
                ->addColumn('target_keyword', function ($row) {
                    $editor_id = $row->id;
                    $target_keyword = EditorTargetKeyword::get('editor_target_keyword.*')->where('editor_id' , $editor_id)->pluck('name');
                    $string = str_replace(array('["','"]'),'',$target_keyword);
                    return $string;
                })
                ->addColumn('score', function ($row) {
                    $editor_id = $row->id;
                    $score = EditorSeoScore::get('editor_seo_score.*')->where('editor_id' , $editor_id)->pluck('score');
                    $string = str_replace(array('[',']'),'',$score);
                    return $string;
                })
                ->addColumn('words', function ($row) {
                    return $row->words;
                })
                ->addColumn('status', function ($row) {
                    return $row->status;
                })
                ->rawColumns(['name', 'target_keyword', 'score', 'words', 'status'])
                ->make(true);
        }   

        $data = array(
            'title' => 'Editor'
        );
        return view('front.editor.index')->with($data);
    }

    public function create()
    {
        $data = array(
            'title' => 'Create Document'
        );
        return view('front.editor.create')->with($data);
    }

}
