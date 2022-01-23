<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// pake model user untuk cek data di table user
use App\User;
// iluminate HAS

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class OtentikasiController extends Controller
{
    public function index(){
        return view('otentikasi.login');
    }

    public function login(Request $request){
        // cek apakah email yang dimasukan ada di database kalo ngga ada akan ada notif notfound
        // $data = User::where('email',$request->email)->firstOrFail();

        // jika email ditemukan cek menggunakan kondisi if
        // if($data){
        //     if(Hash::check($request->password, $data->password)){
        //         // membuat session
        //         session(['berhasil_login' => true]);
        //         return redirect('/dashboard');
        //     }
        // }

        // CEK MENGGGUNAKAN BAWAAN DARI LARAVEL AUTH
    //     if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    //     //     return redirect('/dashboard');
    //     // }
    //     // return redirect('/')->with('notif','Email atau Password Anda Salah!');
    }



    public function logout(Request $request){
        // logout menggunakan session
        // $request->session()->flush();

        // logout menggunakan auth aravel
    //     Auth::logout();
    //     return redirect('/');
    // }
}
}
