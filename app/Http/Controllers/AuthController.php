<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function register(){
        if(session('isLogin') === true){
            return redirect('/');
        }
        
        return view('auth.register');
    }
    
    public function store_register(Request $request){
        $request->validate([
            'username' => 'required|alpha_dash',
            'password' => 'required|min:8|alpha_dash',
            'confirm' => 'same:password'
            ]);
            
        //buat salt
        $salt = uniqid('', true);
            
        $save = DB::table('user')->insert([
            'username' => $request->username,
            'password' => md5($request->password).$salt,
            'salt' => $salt,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
        if($save){
            return redirect('/login')->with('register', 'Anda berhasil mendaftar, silahkan login');
        }
    }
    
    public function login(){
        if(session('isLogin') == true){
            return redirect('/');
        }
        
        return view('auth.login');
    }
    
    public function store_login(Request $request){
        
        //jika username ada 
        $user = DB::table('user')->where('username', $request->username)->first();
        
        if($user){
            
            //jika password benar
            if($user->password === md5($request->password).$user->salt){
                session([
                    'isLogin' => true,
                    'id' => $user->id,
                    'username' => $user->username,
                    ]);
                return redirect('/');
            }
            
            //jika password salah
            return redirect('/login')->with('password', 'Password tidak cocok');
        }
        
        //jika username tidak ada
        return redirect('/login')->with('username', 'Username tidak cocok');
    }
    
    public function logout(){
        session()->flush();
        return redirect('/login');
    }
    
}
