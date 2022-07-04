<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherPages extends Controller
{
    public function privacy_policy(){
        $title = "Privacy Policy";
        return view('otherpages.privacy',get_defined_vars());
    }
}
