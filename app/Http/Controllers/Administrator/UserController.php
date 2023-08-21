<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\GptHistory;
use App\Models\MonthlyPack;
use App\Models\Package;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSubscriptionLog;
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
            $data = User::with('user_package')->where('user_type','main')->latest('id')->get(['users.*',
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
                    if(!empty($row->user_package)){
                        if ($row->user_package->package_id == 1) {
                            $span = '<span class="badge bg-success">Free - 5000</span>';
                        }
                        if ($row->user_package->package_id == 2 || $row->user_package->package_id == 6) {
                            $span = '<span class="badge bg-info">Pro - 20000</span>';
                        }
                        if ($row->user_package->package_id == 3 || $row->user_package->package_id == 7) {
                            $span = '<span class="badge bg-primary">Pro - 50000</span>';
                        }
                        if ($row->user_package->package_id == 4 || $row->user_package->package_id == 8) {
                            $span = '<span class="badge bg-warning">Pro - 200000</span>';
                        }if ($row->user_package->package_id == 5 || $row->user_package->package_id == 9) {
                            $span = '<span class="badge bg-secondary">Pro - 500000</span>';
                        }
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
                    return '<a href="'.route('admin.user.edit',$row->hashid).'" style="font-size:20px;"><i class="fadeIn animated bx bx-edit"></i></a>
                    <a href="javascript:void(0);" onclick="ajaxRequest(this)" data-url="'.route('admin.user.delete',$row->hashid).'" style="font-size:20px;color:red;"><i class="fadeIn animated bx bx-trash me-1"></i></a>';
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
            // 'user_packages_id' => $final,   ->where('price','>',0)
            'packages' => Package::select('id','words','price','plan_code','title')->orderBy('id')->get()
        );
        return view('admin.users.edit')->with($data);
    }


    public function update(Request $request)
    {
        $rules = [
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'user_status' => 'required',
            'words_limit' => 'required',
            'end_date' => 'required',
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
        // $user->has_package = $request->user_package;
        $package_id->words = $request->words_limit;
        $package_id->end_date = $request->end_date;
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

    public function update_subscription(Request $request){

        $rules = [
            'subscription' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $package = Package::find($request->subscription);
        if($package->plan_code == 'FRP0'){
            $end_date = now()->addDays(7)->format('Y-m-d');
        }else{
            $end_date = now()->addMonth()->format('Y-m-d');
        }
        $user_package = new UserPackage();
        $user_package->package_id = $package->id;
        $user_package->user_id = $request->user_id;
        $user_package->words = $package->words;
        $user_package->research_limit = $package->research_limit;
        $user_package->workspace_users = $package->workspace_users;
        $user_package->start_date = now()->format('Y-m-d');
        $user_package->end_date = $end_date;
        $user_package->save();

        $yearly_sku = ['P20-year', 'P50-year', 'P200-year', 'P500-year'];

        if (in_array($package->plan_code, $yearly_sku)) {
            $start_date = date('Y-m-d');
            $monthly_packs = [];

            for ($i = 1; $i <= 12; $i++) {
                if ($i == 1) {
                    $end_date = date('Y-m-d', strtotime('+30 days'));
                    $monthly_packs[$i] = [
                        'user_id' => $user_package->user_id,
                        'package_id' => $user_package->package_id,
                        'user_package_id' => $user_package->id,
                        'words' => $user_package->words,
                        'research_limit' => $user_package->research_limit,
                        'workspace_users' => $user_package->workspace_users,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                } else {
                    $start_date = $monthly_packs[($i - 1)]['end_date'];
                    $end_date = date('Y-m-d', strtotime('+30 days', strtotime($start_date)));
                    $monthly_packs[$i] = [
                        'user_id' => $user_package->user_id,
                        'package_id' => $user_package->package_id,
                        'user_package_id' => $user_package->id,
                        'words' => $user_package->words,
                        'research_limit' => $user_package->research_limit,
                        'workspace_users' => $user_package->workspace_users,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            if (!empty($monthly_packs) && count($monthly_packs) > 0) {
                MonthlyPack::insert($monthly_packs);
                $user_package->end_date = now()->addYear()->format('Y-m-d');
                $user_package->save();
            }
        }

        $userSubscriptionLog = new UserSubscriptionLog();
        $userSubscriptionLog->user_id = $user_package->user_id;
        $userSubscriptionLog->user_package_id = $user_package->id;
        $userSubscriptionLog->new_package_id = $package->id;
        $userSubscriptionLog->buy_from = 'admin';
        $userSubscriptionLog->save();

        $user = User::find($request->user_id);
        $user->has_package = $package->id;
        $user->save();

        session()->flash('success-msg','User Subscription Updated Successfully');

        return response()->json([
            'redirect' => route('admin.user.all'),
        ]);
    }
}
