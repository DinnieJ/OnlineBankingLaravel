<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;
class ConfirmController extends Controller
{
    public function showConfirm(){
        if(Auth::user()->status == 1){
            return redirect()->to("/home");
        }
        return view("auth.confirm");
    }

    public function doConfirm(Request $request){
        $this->validate($request,[
            'confirm_code' => 'required|min:16',
        ]);

        $db_code = Auth::user()->confirm_code;
        if($request->get('confirm_code') == $db_code){
            $user = User::find(Auth::user()->id);
            $user->status = 1;
            $user->save();
            Auth::user()->status = 1;
            return redirect()->to("/home");
        }else{
            return back();
        }
    }
}
