<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(){
        $title = "Home";
        return view('user.index',get_defined_vars());
    }
}
