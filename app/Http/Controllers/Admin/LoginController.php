<?php

namespace App\Http\Controllers\Admin;


require_once '\resources\org\code\Code.class.php';
class LoginController extends CommonController
{
    public function login()
    {
        return view('admin.login');
    }

    public function code()
    {
//        echo '2222';
        $code = new \Code;
        echo $code->make();
    }

    public function getcode()
    {
        $code = new \Code;
        echo $code->get();
    }
}
