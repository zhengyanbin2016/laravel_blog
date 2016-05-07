<?php

namespace App\Http\Controllers\Admin;



class LoginController extends CommonController
{
    public function login(){
        return view('admin.login');
    }
}
