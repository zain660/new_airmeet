<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackagesType;
use App\Models\Subscription;
class PackageSubscriptionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
      $title = "Airmeet - Packages & Subscription";
        $all_package_type = PackagesType::where('is_active',1)->get();
      return view('admin.packages.index',get_defined_vars());
    }

    public function create_package(Request $request){
        $title = "Airmeet - Create Packages";
        return view('admin.packages.create',get_defined_vars());
    }

    public function add_package(Request $request){
        $create = new Package;
        $create->package_name = $request->package_name;
        $create->package_duration = $request->package_duration;
        $create->package_duration_days = $request->package_duration_days;
        $create->package_type = $request->package_type;
        $create->price = $request->price;
        $create->shot_description = $request->shot_description;
        $create->event_registation = $request->event_registation ?? 0;
        $create->comunity = $request->comunity ?? 0;
        $create->track_events = $request->track_events ?? 0;
        $create->max_session_duration = $request->max_session_duration ?? 1;
        $create->sociall_lounge = $request->sociall_lounge ?? 0;
        $create->speed_networking = $request->speed_networking ?? 0;
        $create->tickting = $request->tickting ?? 0;
        $create->allow_recording = $request->allow_recording ?? 0;
        $create->event_branding = $request->event_branding ?? 0;
        $create->allow_priority_support = $request->allow_priority_support ?? 0;
        $create->public_api = $request->public_api ?? 0;
        $create->custom_registration = $request->custom_registration ?? 0;
        $create->event_support = $request->event_support ?? 0;
        $create->is_active = 1;

        $create->save();
      toast('Package created successfuly', 'success');
      return redirect('/admin/packages');
    }

    public function all_packages($id){
      $all_packages = Package::where('is_active',1)->where('package_type',$id)->get();
      $title = 'Aitmeet - Packages';
      return view('admin.packages.all_packages',get_defined_vars());
    }

    public function edit(Request $request, $id){

      $package = Package::find($id);
        return view('admin.packages.edit',get_defined_vars());
    }

    public function package_update(Request $request,$id){
      Package::where('id',$id)->update(array(
        'package_type' => $request->package_type,
        'package_name' => $request->package_name,
        'package_duration' => $request->package_duration,
        'package_duration_days' => $request->package_duration_days,
        'price' => $request->price,
        'shot_description' => $request->shot_description,
        'event_registation' => $request->event_registation ?? 0,
        'comunity' => $request->comunity ?? 0,
        'track_events' => $request->track_events ?? 0,
        'max_session_duration' => $request->max_session_duration ?? 1,
        'sociall_lounge' => $request->sociall_lounge ?? 0,
        'speed_networking' => $request->speed_networking ?? 0,
        'tickting' => $request->tickting ?? 0,
        'allow_recording' => $request->allow_recording ?? 0,
        'event_branding' => $request->event_branding ?? 0,
        'allow_priority_support' => $request->allow_priority_support ?? 0,
        'public_api' => $request->public_api ?? 0,
        'custom_registration' => $request->custom_registration ?? 0,
        'event_support' => $request->event_support ?? 0,
      ));
      toast('Package created successfuly', 'success');
      return redirect()->back()->with('success','Package Updated Successfuly');
    }

    public function destroy_package($id){
      Package::where('id',$id)->update(array(
        'is_active' => 0
      ));
      toast('Package Deleted successfuly', 'error');
      return redirect()->back()->with('error','Package Deleted Successfuly');
    }

    public function all_subscription($id){
      $title = 'Airmeet - Subsciption';
      $subscription = Subscription::where('package_id',$id)->where('is_active',1)->get();
      return view('admin.packages.subscription.index',get_defined_vars());
    }

    public function add_subscription(Request $request){
      $title = 'Airmeet - Create Subsciption';
      return view('admin.packages.subscription.create',get_defined_vars());
    }

    public function create_subscription(Request $request){
      // dd($request->all());
      $subscription = new Subscription;
      $subscription->package_id = $request->package_id;
      $subscription->name = $request->name;
      $subscription->subscription_type = $request->subscription_type;
      $subscription->subs_duration = $request->subs_duration;
      $subscription->monthly_yearly = $request->monthly_yearly;
      $subscription->price = $request->price;
      $subscription->total_registration = $request->total_registration;
      $subscription->save();
      toast('Subscription Created successfuly', 'success');
      return redirect()->back()->with('success','Subscription Created successfuly');
    }

    public function edit_subscription(Request $request, $id){
      // $title = "Aitmeet Subscription Edit";
      // $subscription = Subscription::findorfail($id);
      // $packages = Package::findorfail($subscription->package_id);
      // dd($packages,$subscription);
      // return view('admin.packages.subscription.edit',get_defined_vars());
      try {
        $title = "Aitmeet Subscription Edit";
        $subscription = Subscription::findOrFail($id);
        return view('admin.packages.subscription.edit',get_defined_vars());
      } catch (\Throwable $th) {
        toast('Sorry! We failed to find the data you are looking for.', 'error');
        return redirect()->back()->with('error','Sorry! We failed to find the data you are looking for or maybe something went wrong.');
      } 
    }

    public function update_subscription(Request $request, $id){
      Subscription::where('id',$id)->update(array(
        'package_id' => $request->package_id,
        'name' => $request->name,
        'subscription_type' => $request->subscription_type,
        'subs_duration' => $request->subs_duration,
        'monthly_yearly' => $request->monthly_yearly,
        'price' => $request->price,
        'total_registration' => $request->total_registration,
      ));
      toast('Subscription data updated successfuly.', 'success');
      return redirect()->back()->with('success','Subscription data updated successfuly.');

    }

    public function subscription_delete($id){
      Subscription::where('id',$id)->update(array(
        'is_active' => 0
      ));
      toast('Subscription data deleted successfuly.', 'success');
      return redirect()->back()->with('success','Subscription data deleted successfuly.');

    }
}
