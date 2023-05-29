<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\GptHistory;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Hashids\Hashids;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'All Users',
        );

        if(request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $data = User::latest('id')->get(['users.*',
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
                ->addColumn('package', function ($row) {
                    $span = '';
                    if ($row->has_package == 1) {
                        $span = '<span class="badge bg-info">Pro - A</span>';
                    }
                    elseif ($row->has_package == 2) {
                        $span = '<span class="badge bg-info">Pro - B</span>';
                    }
                    elseif ($row->has_package == 3) {
                        $span = '<span class="badge bg-info">Pro - C</span>';
                    }
                    elseif ($row->has_package == 4) {
                        $span = '<span class="badge bg-info">Pro - D</span>';
                    } else {
                        $span = '<span class="badge bg-success">Free</span>';
                    }
                    return $span;
                })
                ->addColumn('status', function ($row) {
                    return view('admin.users.status_col')->with(['data'=>$row])->render();
                })
                ->addColumn('created_at', function ($row) {
                    return get_fulltime($row->created_at);
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('admin.user.edit',$row->hashid).'" style="font-size:20px;"><i class="fadeIn animated bx bx-edit"></i></a>';
                })
                ->rawColumns(['first_name', 'last_name', 'email', 'package','status', 'created_at','action'])
                ->make(true);
        }

        return view('admin.users.index')->with($data);
    }

    public function update_status($id)
    {
        $user = User::hashidFind($id);
        $user->is_active = !$user->is_active;
        $user->save();
        session()->flash('success-msg','User Status Changed Successfully');

        return response()->json([
            'success' => 'User Status Changed Succesfully',
            'reload' => true,
        ]);
    }

    public function edit($id)
    {
        $cnvrt = User::hashidFind($id);
        $final = $cnvrt->id;
        $data = array(
            'title' => 'Edit User',
            'edit' => User::hashidFind($id),
            // 'user_packages_id' => UserPackage::hashidFind($id),
            // 'user_packages_id' => UserPackage::where('user_id', $final),
            'user_packages_id' => UserPackage::get('user_packages.*')->where('user_id' , $final)->last(),
            // 'allusers' => UserPackage::get('user_packages.*'),
            // 'user_packages_id' => $final, 
        );
        return view('admin.users.edit')->with($data);
    }


    public function update(Request $request)
    {
        $rules = [
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'user_status' => 'required',
        ];

        if (!empty($request->password)) {
            $rules['password'] = 'string|min:8';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $user = User::find($request->id);
        $package_id = UserPackage::find($request->package_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->is_active = $request->user_status;
        $user->has_package = $request->user_package;
        $package_id->words = $request->words_limit;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $package_id->save();
        session()->flash('success-msg','User Updated Successfully');
        
        return response()->json([
            'redirect' => route('admin.user.all'),
        ]);
        // return view('admin2.users.index');
    }

    public function delete($id)
    {
        $user = User::hashidFind($id);
        GptHistory::where('user_id',$user->id)->delete();
        $user->delete();

        session()->flash('success-msg','User Deleted Successfully');

        return response()->json([
            'reload' => true,
        ]);
    }
}
