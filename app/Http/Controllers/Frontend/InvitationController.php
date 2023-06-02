<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendInvite;
use App\Models\WorkSpaceInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class InvitationController extends Controller
{

    public function index()
    {
        if (session()->get('authUser')->user_type != 'main') {
            abort(403,'You are not authorized to access that page');
            die();
        }

        if (request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $invites = new WorkSpaceInvite();

            $invites = $invites->where('user_id', auth('web')->id())->orderBy('id', 'DESC')->get([
                'work_space_invites.*',
                DB::raw('@rownum  := @rownum  + 1 AS rownum')
            ]);
            return DataTables::of($invites)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        return '<span class="badge bg-warning">Pending</span>';
                    }else{
                        return '<span class="badge bg-success">Accepted</span>';
                    }
                })
                ->rawColumns(['email','status'])
                ->make(true);
        }

        $data = array(
            'title' => 'Invite Users',
        );

        return view('front.invite.index',$data);
    }

    public function send_invitation(Request $request)
    {

        $UserPackages = session()->get('UserPackages');

        $limit_check = WorkSpaceInvite::where('user_id',auth('web')->id());

        if ($limit_check->count() >= $UserPackages->workspace_users) {
            return ['error' => 'Your Invite Limit Reached'];
        }

        $rules['email'] = ['required', 'string', 'email', 'unique:users,email'];
        $messages = [
            'unique' => 'user :attribute is already registered please use another email',
        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $exists = WorkSpaceInvite::where('email',$request->email)->exists();

        if($exists){
            return ['error' => 'user email is already exists in invitations'];
        };

        $auth_user = auth('web')->user();

        $invitation = new WorkSpaceInvite();

        $invitation->user_id = $auth_user->id;
        $invitation->email = $request->email;
        $invitation->save();

        $detail = [
            'title' => 'WorkSpace Invitation',
            'body' => 'You are invited by '.$auth_user->full_name.' on his/her workspace to join his team',
            'url' => route('register',['invitation_code'=>$invitation->hashid]),
        ];

        Mail::to($request->email)->send(new SendInvite($detail));

        session()->flash('success-msg','Invitation sent to '.$invitation->email);

        return response()->json([
            'status' => true,
        ]);
    }
}
