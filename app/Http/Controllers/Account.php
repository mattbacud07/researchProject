<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Account extends Controller
{
    public function index(){
        return view('form_login');
    }

    public function account_login(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');

        $tbl_user = DB::table('users');
        $tbl_user->select('*');
        $tbl_user->where(['email' => $username]);
        $data = $tbl_user->get();

        if($data){
            return redirect()->to(route('home'))->with('message','Good Password');
        }
        else{
            return redirect()->to(route('home'))->with('message','Wrong Password');
        }
    }
}
