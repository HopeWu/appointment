<?php

namespace App\Http\Controllers;

class AdminDashController extends Controller
{
    public function index(){
        return view('admin-schedules');
    }
}