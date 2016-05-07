<?php

namespace App\Http\Controllers\Admin;



use Illuminate\Support\Facades\Input;

require_once '\resources\org\code\Code.class.php';
class LoginController extends CommonController
{
    public function login()
    {
        $code = new \Code;
        $_code = $code->get();
        if ($input=Input::all()){
            if(strtoupper($input['code'])!=$_code){
                return back()->with('msg','验证码错误');
            }
            echo 'yan zheng tong guo';
        }else{
            return view('admin.login');
        }
    }

    public function code()
    {
//        echo '2222';
        $code = new \Code;
        echo $code->make();
    }

/*    public function getcode()
    {
        $code = new \Code;
        echo $code->get();
    }*/
    
}
