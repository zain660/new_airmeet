<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackagesType;
class PackageTypeController extends Controller
{
    public function index(){
        $title = 'Packge Type';
        $package_type = PackagesType::where('is_active',1)->get();
        return view('admin.package_type.index',get_defined_vars());
    }

    public function add_packge_type(Request $request){
        return view('admin.package_type.create',get_defined_vars());
    }

    public function create(Request $request){
        $create = new PackagesType;
        $create->package_type = $request->package_type;
        $create->short_desc = $request->short_desc;
        $create->save();
        toast('Package Type Created','success');
        return redirect('admin/packages/all-package-type');
    }

    public function edit(Request $request, $id){
        try {
            $package_type =  PackagesType::findorfail($id);
            return view('admin.package_type.edit',get_defined_vars());
        } catch (\Throwable $exception) {
            //throw $th;
            return redirect()->back()->with('error','Sorry! We are unable to find the data you are looking for.');
            return false;
        }
 
    }
    public function update(Request $request, $id){
        PackagesType::where('id',$id)->update(array(
            'package_type' => $request->package_type,
            'short_desc' => $request->short_desc
        ));     
        toast('Package Type Updated','success');
        return redirect('admin/packages/all-package-type');
    }

    public function destroy($id){
        PackagesType::where('id',$id)->update(array(
            'is_active' => 0,
        ));     
        toast('Package Type Deleted','success');
        return redirect('admin/packages/all-package-type');
    }
}
