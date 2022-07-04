<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackagesType;
use App\Models\Package;
use App\Models\Subscription;
use Stripe;
use Illuminate\Support\Facades\Auth;
use App\Models\SubscribedUser;
use App\Models\BillingAddress;
use App\Models\User;
class UpgradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $title = "Upgrade Plan";
        $package_type = PackagesType::where('is_active',1)->get();
        return view('user.packages.index',get_defined_vars());
    }

    public function get_packages_ajax($id){
        $packges = Package::where('package_type',$id)->where('is_active',1)->get();
        return response()->json([
            // 'data_count' => $packges->count(),
            'data' => $packges
        ]);
    }

    public function card_payment($id){
        $title = "Payment";
        try {
            //code...
            $packges = Package::findorfail($id);
            $PackagesType = PackagesType::findorfail($id);
            $monthly_subscription = Subscription::where('package_id',$id)->where('subscription_type',0)->get();
            $yearly_subscription = Subscription::where('package_id',$id)->where('subscription_type',1)->get();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/user/organization/upgrade-account')->with('error','Something went wrong.');
        }
      
            //  dd($monthly_subscription,$yearly_subscription);
        return view('user.packages.payment',get_defined_vars());
    }

    public function payment(Request $request){
        // dd($request->all());
        try {
            //code...
            $subscribed = SubscribedUser::where('user_id',Auth::user()->id)->first();
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe =  Stripe\Charge::create ([
                    "amount" => $request->price * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "account upgrade fees"
            ]);
            if($subscribed == null){
                $subscribed = Subscription::where('id',$request->subs_id)->first();
            
                $packges = Package::findorfail($subscribed->package_id);

                $create = new SubscribedUser;
                $create->user_id = Auth::user()->id;
                $create->subscription_id = $request->subs_id;
                $create->subscription_starting_date = date('d-m-Y');
                $create->subscription_end_date = date('d-m-Y');
                $create->save();
                User::where('id',Auth::user()->id)->update(array(
                    'invitation_team' => $packges->invitation_team
                ));
            }else{
                $subscribed = Subscription::where('id',$subscribed->subscription_id)->first();
            
                $packges = Package::findorfail($subscribed->package_id);

                SubscribedUser::where('user_id',Auth::user()->id)->update(array(
                    'subscription_id' => $request->subs_id,
                    'subscription_id' => $request->subs_id,
                    'subscription_starting_date' => date('d-m-Y'),
                    'subscription_end_date' => date('d-m-Y'),
                ));
                 $total_invite = $packges->invitation_team + Auth::user()->invitation_team;

                User::where('id',Auth::user()->id)->update(array(
                    'invitation_team' => $total_invite
                ));
            }
           

            $create_address = new BillingAddress;
            $create_address->user_id = Auth::user()->id;
            $create_address->name = $request->name;
            $create_address->company_name = $request->company_name;
            $create_address->country = $request->country;
            $create_address->state =  $request->state;
            $create_address->vat_num = $request->vat_num;
            $create_address->post_zip_code =  $request->post_zip_code;
            $create_address->save();
            return redirect('/user/dashboard')->with( 'success','Account upgrad successfuly');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error',$th);
        }
    }
}
