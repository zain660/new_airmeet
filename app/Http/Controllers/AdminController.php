<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        $title = 'Admin/Dashboard';
        return view('admin.index',get_defined_vars());
    }
}
