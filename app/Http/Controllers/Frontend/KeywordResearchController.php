<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CountryLanguage;
use App\Models\KeywordResearch;
use App\Models\KeywordSuggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class KeywordResearchController extends Controller
{
    public function index()
    {
        // check user not active free package code
        // $UserPackages = session()->get('UserPackages');
        // if($UserPackages->package_id == 1){
        //     return redirect()->route('user.dashboard');
        // }        
        // check user not active free package code
        
        $authUserId = session()->get('authUserId');

        if (request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $KeywordResearch = new KeywordResearch();

            $KeywordResearch = $KeywordResearch->where('user_id', $authUserId)->orderBy('id', 'DESC')->get([
                'keyword_research.*',
                DB::raw('@rownum  := @rownum  + 1 AS rownum')
            ]);
            return DataTables::of($KeywordResearch)
                ->addIndexColumn()
                ->addColumn('country', function ($row) {
                    return $row->country->name;
                })
                ->addColumn('number_of_keywords', function ($row) {
                    return $row->suggestions()->count();
                })
                ->addColumn('Date', function ($row) {
                    return $row->created_at->format('Y-m-d');
                })
                ->addColumn('action',function($row){
                    return "<a class='text-primary' style='font-size:20px;' href='".route('user.keyword-suggestion.report',$row->hashid)."'><i class='lni lni-eye'></i></a>&nbsp;
                    <a href='javascript:void(0);' onclick='ajaxRequest(this)' data-url='".route('user.keyword-suggestion.delete',$row->hashid)."' class='text-danger' title='delete' style='font-size:20px;'><i class='fadeIn animated bx bx-trash'></i></a>
                    ";
                })
                ->rawColumns(['keyword','country', 'number_of_keywords', 'Date','action'])
                ->make(true);
        }
        $data = array(
            'title' => 'Keyword Suggestion',
            'locations' => Country::orderBy('name')->get(),
        );

        return view('front.keyword_research.index')->with($data);
    }

    public function keyword_report($id)
    {
        // check user not active free package code
        // $UserPackages = session()->get('UserPackages');
        // if($UserPackages->package_id == 1){
        //     return redirect()->route('user.dashboard');
        // }        
        // check user not active free package code

        $data = array(
            'title' => 'Keyword Report',
            'data' => KeywordResearch::hashidFind($id),
        );

        return view('front.keyword_research.report')->with($data);
    }

    public function find_keywords(Request $request)
    {
        // check user not active free package code
        $UserPackages = session()->get('UserPackages');
        if($UserPackages->package_id == 1){
            return response()->json([
                'error' => "You don't have access to this tool. Please upgrade your subscription to use it.",
            ]);
            die();
        }        
        // check user not active free package code

        $authUserId = session()->get('authUserId');


        $UserPackages = session()->get('UserPackages');
        $From = $UserPackages->start_date;
        $tomorrow = date('Y-m-d', strtotime(' +1 day'));

        $limit_check = KeywordResearch::withTrashed()->where('user_id',$authUserId)->whereBetween('created_at', [$From,$tomorrow]);

        if ($limit_check->count() >= $UserPackages->research_limit) {
            return response()->json([
                'error' => 'Your Keywords Research Limit Reach',
            ]);
        }

        $rules = [
            'location' => 'required',
            'target_keyword' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $search_keywords_data[] = [
            'keyword' => strtolower($request->target_keyword),
            'location_code' => $request->location,
            'include_seed_keyword' => true,
            'include_serp_info' => true,
            'exact_match' => true,
            'limit' => 100,
            'offset' => 0,
            "order_by" => ['keyword_info.search_volume,desc']
        ];

        // dd(json_encode($search_keywords_data));

        // 09a12919df3e0ade
        // wynivemuv@mailinator.com


        $res = $this->search_keywords(json_encode($search_keywords_data));

        // dd($res->tasks[0]);


        if (isset($res->tasks[0])) {
            if ($res->tasks[0]->status_code == 40201) {
                return response()->json([
                    'error' => $res->tasks[0]->status_message
                ]);

            }elseif(isset($res->tasks[0]->result[0])) {
                if (empty($res->tasks[0]->result[0]->items)) {
                    return response()->json([
                        'error' => 'Not Data Found try again with different keyword',
                    ]);
                }else{
                    $keyword_res = new KeywordResearch();
                    $keyword_res->user_id = $authUserId;
                    $keyword_res->keyword = $request->target_keyword;
                    $keyword_res->country_code = $request->location;
                    $keyword_res->save();


                    $suggestion_array = [];
                    foreach ($res->tasks[0]->result[0]->items as $key => $value) {
                        $suggestion_array[] = [
                            'keyword_id' => $keyword_res->id,
                            'keyword' => $value->keyword,
                            'volume' => $value->keyword_info->search_volume,
                            'competition_level' => $value->keyword_info->competition_level,
                            'search_volume' => $value->keyword_info->cpc,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    KeywordSuggestion::insert($suggestion_array);
                    // session()->flash('success-msg','Keywords Suggestions Found & Saved');
                    return response()->json([
                        // 'success' => 'Keywords Suggestions Found & Saved',
                        'redirect' => route('user.keyword-suggestion.report',$keyword_res->hashid),
                    ]);
                }
            }else{
                return response()->json([
                    'error' => 'Something Went Wrong Try Again',
                ]);
            }



        }else{
            return response()->json([
                'error' => 'Something Went Wrong Try Again',
            ]);
        }

        // if (isset($res->tasks[0]) && isset($res->tasks[0]->result[0]) && empty($res->tasks[0]->result[0]->items)) {
        //     return response()->json([
        //         'error' => 'Not Data Found',
        //     ]);
        // }

        // dd($res);
    }

    public function delete($id)
    {
        $keyword_res = KeywordResearch::hashidFind($id);
        $keyword_res->suggestions()->delete();
        $keyword_res->delete();

        session()->flash('success-msg','Record Deleted');
        return response()->json([
            'success' => 'Record Deleted',
            'reload' => true,
        ]);
    }

    public function get_languages(Request $request)
    {
        $language = CountryLanguage::where('country_id', $request->id)->orderBy('name')->get(['name', 'language_code']);

        $html = '<option>none<option>';
        foreach ($language as $key => $val) {
            $html .= "<option value='{$val->language_code}'>{$val->name}<option>";
        }

        return response()->json($html);
    }
    // 15b23e87cc1327fa

    private function search_keywords($data)
    {
        $username = 'lidanex@gmail.com';
        $password = 'fc53e701e81bec41';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.dataforseo.com/v3/dataforseo_labs/google/keyword_suggestions/live',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_USERPWD => $username . ':' . $password,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',       
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response);
        return $data;
        // if (isset($data->status_code) && $data->status_code == 20000 && isset($data->result[0])) {
        //     return $data->result[0];
        // }
    }
}
