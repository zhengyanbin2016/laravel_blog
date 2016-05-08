<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once '\resources\org\code\Code.class.php';
class LoginController extends CommonController
{
    /*public function test()
    {
        $user = User::first();
        print_r($user->user_name);
        print_r($user->user_pass);
    }*/

    public function login()
    {
        $_SESSION['code'] = null;
        $code = new \Code;
//        $code->make();
        $_code = $code->get();
        if ($input=Input::all()){
            if(strtoupper($input['code'])!==$_code){
                return back()->with('msg','验证码错误');
            }
            $user = User::first();
            if($input['user_name']!==$user->user_name||$input['user_pass']!==Crypt::decrypt($user->user_pass)){
                return back()->with('msg','用户名或密码错误');
            }
            $_SESSION['user']=$user;
//            dd(session('user'));
//            dd($_SESSION['user']);
            return redirect('admin/index');
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
    public function crypt()
    {
        $str = '123456';
        $str_p = 'eyJpdiI6IkxTVTN4SFd0YlQxK3JtQkR6cUEyUlE9PSIsInZhbHVlIjoiV3hUMWZpOXpcL1ZkaGNOSW9EQnpMNXc9PSIsIm1hYyI6ImJkNDQ4NzczY2I2MTk0NTQ0YmQ4MzVjOTcwOTMyMmViM2JlNzQ1MDg1ZDhjMWVhMmQ3YzNjYTNhYTBiNjk5MGUifQ';
        echo Crypt::encrypt($str);
        echo "<br/>";
//        dd($str);enble to use dd();
        echo Crypt::decrypt($str_p);
    }


}
