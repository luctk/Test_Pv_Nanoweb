<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('POSt')){
            if(Auth::attempt(['loginId'=>$request->loginId,'password'=>$request->password])){
                return redirect()->route('list-nhanvien');
            }else{
                Session::flash('error','sai mật khẩu hoặc tên đăng nhập');
                return redirect()->route('login');
            }
        }
        return view('auth.login');
    }
    public function loguot(){
        Auth::logout();
        return redirect()->route('login');
    }
}
