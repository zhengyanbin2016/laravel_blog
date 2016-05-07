<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        //        echo '111';
        $pdo = DB::connection()->getPdo();
        dd($pdo);


    }
}
