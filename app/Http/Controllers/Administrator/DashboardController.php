<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\CountryLanguage;
use App\Models\GptHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        if (session()->has('offset')) {
            session()->forget('offset');
        }
        $user = new User();
        $history = new GptHistory();
        $data = array(
            'title' => 'Dashboard',
            'total_users' => $user->where('user_type','main')->count(),
            'month_users' => $user->where('user_type','main')->whereMonth('created_at', Carbon::now()->month)->count(),
            'total_req' => $history->count(),
            'month_req' => $history->whereMonth('created_at', Carbon::now()->month)->count(),
            'total_token' => $history->sum('total_tokens'),
            'month_token' => $history->whereMonth('created_at', Carbon::now()->month)->sum('total_tokens'),
            'month_words' => $history->whereMonth('created_at', Carbon::now()->month)->sum('total_words'),
            'total_words' => $history->whereMonth('created_at', Carbon::now()->month)->sum('total_words'),
        );

        if(request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $data = GptHistory::latest('id')->get(['gpt_histories.*',
            DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
            $userdata = User::latest('id')->get(['users.*',
            DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('user_id', function ($row) {
                    $user_id = !empty($row->user_id) ? $row->user_id : '-';
                    return $user_id;
                })
                ->editColumn('template_id', function ($row) {
                    $template_id = !empty($row->template_id) ? $row->template_id : '-';
                    return $template_id;
                })
                ->editColumn('template_name', function ($row) {
                    $template_name = !empty($row->template_name) ? $row->template_name : '-';
                    return $template_name;
                })
                ->editColumn('total_words', function ($row) {
                    $total_words = !empty($row->total_words) ? $row->total_words : '-';
                    return $total_words;
                })
                ->editColumn('total_tokens', function ($row) {
                    $total_tokens = !empty($row->total_tokens) ? $row->total_tokens : '-';
                    return $total_tokens;
                })
                ->addColumn('created_at', function ($row) {
                    return get_fulltime($row->created_at);
                })
                ->rawColumns(['user_id', 'template_id', 'template_name', 'total_words', 'total_tokens', 'created_at'])
                ->make(true);
            }
        return view('admin.content.dashboard.analytics')->with($data);
    }

    public function edit_profile()
    {
        $data = array(
            'title' => 'Profile',
            'edit' => auth('admin')->user(),
        );

        return view('admin.profile')->with($data);
    }

    public function update_profile(Request $request)
    {
        $rules = [
            'first_name' => 'string|max:50',
            'last_name' => 'string|max:50',
            'password' => 'string|min:8|max:16',
            'email' => 'email',
        ];

        if (isset($request->profile_image) && !empty($request->profile_image)) {
           $rules['profile_image'] = 'image|mimes:png,jpg';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $user = Admin::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if ($request->hasFile('profile_image')) {
            $profile_img = uploadSingleFile($request->file('profile_image'), 'uploads/profile_images/');
            if (is_array($profile_img)) {
                return response()->json($profile_img);
            }
            if (file_exists($user->image)) {
                @unlink($user->image);
            }
            $user->image = $profile_img;
        }

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        session()->flash('success-msg','Profile Updated Successfully');
        return response()->json([
            'reload' => true,
        ]);
    }

    public function contactList(Request $request){
        $data = array(
            'title' => 'Contact List',
        );

        if(request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $data = ContactUs::latest('id')->get(['contact_us.*',
            DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return get_fulltime($row->created_at);
                })
                ->rawColumns(['name', 'email', 'phone','subject', 'message','created_at','action'])
                ->make(true);
        }

        return view('admin.contact_list')->with($data);
    }
}
