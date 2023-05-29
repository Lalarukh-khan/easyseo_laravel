<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class AdminUserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'All Admin User',
        );

        if(request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $data = Admin::latest('id')->get(['admins.*',
            DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('first_name', function ($row) {
                    $first_name = !empty($row->first_name) ? $row->first_name : '-';
                    return $first_name;
                })
                ->editColumn('last_name', function ($row) {
                    $last_name = !empty($row->last_name) ? $row->last_name : '-';
                    return $last_name;
                })
                ->addColumn('status', function ($row) {
                    return view('admin.admin_users.status_col')->with(['data'=>$row])->render();
                })
                ->addColumn('created_at', function ($row) {
                    return get_fulltime($row->created_at);
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('admin.admin-users.edit',$row->hashid).'" style="font-size:20px;"><i class="fadeIn animated bx bx-edit"></i></a>
                    <a href="javascript:void(0)" onclick="ajaxRequest(this)" data-url="'.route('admin.admin-users.delete',$row->hashid).'" style="font-size:20px;" class="text-danger"><i class="fadeIn animated bx bx-trash"></i></a>
                    ';
                })
                ->rawColumns(['first_name', 'last_name', 'username','email' ,'status','action'])
                ->make(true);
        }

        return view('admin.admin_users.index')->with($data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add Admin User',
        );

        return view('admin.admin_users.add')->with($data);
    }

    public function edit($id)
    {
        $data = array(
            'title' => 'Edit Admin User',
            'edit' => Admin::hashidFind($id),
        );

        return view('admin.admin_users.add')->with($data);
    }

    public function save(Request $request)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:80'],
        ];

        if (!$request->user_id) {
            $rules['username'] = ['required', 'string', 'unique:admins,username'];
            $rules['email'] = ['required', 'string', 'unique:admins,email'];
            $rules['password'] = ['required', 'string', 'min:8'];
        }

        if (isset($request->profile_image) && $request->profile_image != 'undefined') {
            $rules['profile_image'] =['required','image','mimes:jpeg,png,jpg'];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        if(!empty($request->user_id)){
            $user = Admin::find($request->user_id);
            $msg = 'Admin User has been updated';
        }else{
            $user = new Admin();
            $user->password = Hash::make($request->password);
            $msg = 'Admin User has been added';
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->user_type = 'admin';
        $user->is_active =  $request->user_status;
        $user->added_by_id = auth('admin')->id();
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
        $user->save();
        session()->flash('success-msg',$msg);
        return response()->json([
            'redirect' => route('admin.admin-users.all'),
        ]);
    }

    public function delete_user(Request $request)
    {
        $user = Admin::hashidFind($request->id);

        if (file_exists($user->image)) {
            @unlink($user->image);
        }

        $user->delete();

        session()->flash('success-msg','Admin User Deleted Succesfully');

        return response()->json([
            'reload' => true,
        ]);
    }

    public function password_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $user = Admin::find($request->user_id);

        $user->password = Hash::make($request->password);
        $user->save();

        session()->flash('success-msg','Password Updated Successfully');

        $msg = [
            'redirect' => route('admin.admin-users.all'),
        ];

        return response()->json($msg);
    }
}
