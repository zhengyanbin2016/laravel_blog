<?php

namespace App\Http\Controllers\Admin;



use App\Http\Models\User;

class IndexController extends CommonController
{
    public function index(){

//        dd($_SESSION['user']);

        return view('admin.index');

    }

    public function info()
    {
        return view('admin.info');
    }

    public function quit()
    {
        $_SESSION['user']=null;

        return redirect('admin/login');
    }
}
