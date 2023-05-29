<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class CompetitionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        include_once(theme_dir('includes/shortcodes.php', true));
    }

    public function competitions()
    {
        $m = \App\Competition::with(['categories' => function ($q) {
            $q->where('status', 'Active');
        }])->where('status', 'Active');

        if (!empty(req('sort'))) {
            $sort = explode('-', req('sort'));
            req('sort', null, $sort[0]);
            req('dir', null, $sort[1]);
        }



        $config = collect(['limit' => 16])->merge(request()->query())->toArray();

        // $SQL =  

        $paginate_OBJ = $m->paginate($config['limit']);
        $response = collect($paginate_OBJ)->map(function ($data, $key) {
            if ($key == 'data') {
                return collect($data)->map(function ($row) {
                    return $row;
                });
            }
            return $data;
        })->all();

        return api_response(['status' => true, 'response' => $response/*, 'where' => $where*/]);
    }

    public function categories()
    {
        $competition_id = req('competition_id');
        if (empty($competition_id)) {
            return api_response([
                'status' => false,
                'message' => 'competition id is required'
            ]);
        }

        $paginate_OBJ = \App\CompetCategory::where('status', 'Active')->where('competition_id', $competition_id)->paginate(16);
        $response = collect($paginate_OBJ)->map(function ($data, $key) {
            if ($key == 'data') {
                return collect($data)->map(function ($row) {
                    return $row;
                });
            }
            return $data;
        })->all();

        return api_response(['status' => true, 'response' => $response/*, 'where' => $where*/]);
    }


    public function competing_participants()
    {
        $competition_id = req('competition_id');
        $category_id = req('category_id');
        if (empty($competition_id)) {
            return api_response([
                'status' => false,
                'message' => 'competition id is required'
            ]);
        }

        $user_compeitions = \App\UserCompetition::with(['category','competition.added_by', 'user','votes']);
            // ->where('status', '!=', 'inactive')
            // ->whereHas('competition', function ($q) {
                // $q->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'));
            // });

        if (!empty($competition_id)) {
            $user_compeitions = $user_compeitions->where('competition_id', $competition_id);
        }

        if (!empty($category_id)) {
            $user_compeitions = $user_compeitions->where('category_id', $category_id);
        }

        // $paginate_OBJ = $user_compeitions->where('status', 'publish')->paginate(16);
        $paginate_OBJ = $user_compeitions->paginate(16);
        $response = collect($paginate_OBJ)->map(function ($data, $key) {
            if ($key == 'data') {
                $collect =  collect($data)->map(function ($row, $i) {
                    $user_dir = null;
                    $user_dir = user_type_info($row['user']['user_type_id'])['dir'];
                    if ($i == 'category') {
                        if (!empty($row['category']['requirements_file'])) {
                            $row['requirements_file'] = asset_url("compet_categories") . '/' . $row['requirements_file'];
                        }
                    }
                    if (!empty($row['cover_image'])) {
                        $row['cover_image'] = asset_url("user_competitions") . '/' . $row['cover_image'];
                    }
                    if (isset($row['competition']) && !empty($row['competition']['thumb'])) {
                        $row['competition']['thumb'] = asset_url("competitions") . '/' . $row['competition']['thumb'];
                    }
                    if (isset($row['user']) && !empty($row['user']['photo'])) {
                        $row['user']['photo'] = asset_url("{$user_dir}") . '/' . $row['user']['photo'];
                    }
                    return $row;
                });
                return $collect;
            }
            return $data;
        })->all();

        return api_response(['status' => true, 'response' => $response]);
    }

    public function participant_details()
    {
        $user_competition_id = req('user_competition_id');
        if (empty($user_competition_id)) {
            return api_response([
                'status' => false,
                'message' => 'User competition id is required'
            ]);
        }

        $user_compeitions = \App\UserCompetition::with(['competition', 'category', 'files', 'user','votes'])->where('id', $user_competition_id);

        if ($user_compeitions->count() == 0) {
            return api_response([
                'status' => false,
                'message' => 'User competition not found with the given id'
            ]);
        }

        $filter = collect($user_compeitions->get())->map(function ($data, $key) {
            if ($key == 'data') {
                $collect =  collect($data)->map(function ($row, $j) {
                    if ($j == 'competition') {
                        $row['thumb'] = asset_url("competitions") . '/' . $row['thumb'];
                    }
                    if ($j == 'category') {
                        if (!empty($row['category']['requirements_file'])) {
                            $row['requirements_file'] = asset_url("compet_categories") . '/' . $row['requirements_file'];
                        }
                    }
                    if ($j == 'files') {
                        $files = collect($row)->map(function ($f) {
                            $f['file_url'] = asset_url("user_competitions") . '/' . $f['file_url'];
                            return $f;
                        });
                        return $files;
                    }
                    if ($j == 'user') {
                        if (!empty($row['photo'])) {
                            $row['photo'] = asset_url("users") . '/' . $row['photo'];
                        }
                    }
                    
                    return $row;
                });

                if (!empty($collect['cover_image'])) {
                    $collect['cover_image'] = asset_url("user_competitions") . '/' . $collect['cover_image'];
                }
                return $collect;
            }
            return $data;
        })->all();

        $response['data'] =  $filter[0];

        return api_response(['status' => true, 'response' => $response/*, 'where' => $where*/]);
    }
    
    public function competing_jury()
    {
        $competition_id = req('competition_id');
        if (empty($competition_id)) {
            return api_response([
                'status' => false,
                'message' => 'competition id is required'
            ]);
        }
        
        $paginate_OBJ = \App\CompetitionJury::where('competition_id',$competition_id)->paginate(16);
        
        $response = collect($paginate_OBJ)->map(function ($data, $key) {
            if ($key == 'data') {
                return collect($data)->map(function ($row) {
                    return $row;
                });
            }
            return $data;
        })->all();
        
         return api_response(['status' => true, 'response' => $response/*, 'where' => $where*/]);
    }
}
