<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\InquiryDetail;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    public function index(Request $request){
        $title = "Inquiry";
        $all_inquiry = Inquiry::all();
        return view('admin.inquiry.index',get_defined_vars());
    }
    public function send_inquiry(Request $request, $id, $user_id){
        // dd($request->all());
        if($request->has('files')){
            $has_file = 1;
            $attechment  = $request->file('files');
            $img_2 =  time().$attechment->getClientOriginalName();
            $attechment->move(public_path('inquiry_files'),$img_2);
        }else{
            $has_file = 0;
            $img_2 = null;
        }  
        $create = new InquiryDetail;
        $create->inquiry_id = $id;
        $create->sender_id = Auth::user()->id;
        // $create->reciever_id = $user_id;
        $create->message = $request->message;
        $create->has_file = $has_file;
        $create->file = $img_2;
        $create->save();
        toast('Inquiry message was sended', 'success');
        return redirect()->back()->with('success','Inquiry message was sended');
    }

    public function userinquiry(){
        $title = "Inquiry";
        $my_inquiry = Inquiry::where('user_id',Auth::user()->id)->get();
        return view('user.inquiry.index',get_defined_vars());
    }

    public function userinquiry_details($id){
        // $my_inquiry = Inquiry::where('id',$id)->first();
        try {
            //code...
            $my_inquiry_details = InquiryDetail::where('inquiry_id',$id)->get();
                    $my_inquiry = Inquiry::findorfail($id);

        } catch (\Throwable $th) {
            // dd('ss');
           return redirect('/user/inquiry')->with('error','Something went wrong');
        }
        return view('user.inquiry.inquiry_details',get_defined_vars());
    }
}
