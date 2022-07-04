<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscribedUser;
use App\Models\Subscription;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use App\Models\Invitation;
use App\Models\User;
class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function team(){
        // $all_team_member = 
        try {
            //code...
            $title = "Team";
            $invited_team = Invitation::where('user_id',Auth::user()->id)->get();
            $subscription_of_auth = SubscribedUser::where('user_id',Auth::user()->id)->first();
            if($subscription_of_auth != null){
                $subscription = Subscription::findorfail($subscription_of_auth->subscription_id);
                $package_details = Package::findorfail($subscription->package_id);
            }else{
                $package_details = null;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return view('user.team.index',get_defined_vars());
    }

    public function send_invitation(Request $request){
        // dd($request->all());
        if(Auth::user()->invitation_team > 0){

        $invitation = new Invitation;
        $invitation->user_id = Auth::user()->id;
        $invitation->f_name = $request->f_name;
        $invitation->l_name = $request->l_name;
        $invitation->team_member_email = $request->team_member_email;
        $invitation->save();
        $total_invite = Auth::user()->invitation_team -1;

        User::where('id',Auth::user()->id)->update(array(
            'invitation_team' => $total_invite
        )); 
        return redirect('/user/organization/team')->with('success','Mail sended successfuly');

        }else{
            return redirect('/user/organization/team')->with('error','You have 0 invitation left... Upgrade your account.');
        }

    }
}
