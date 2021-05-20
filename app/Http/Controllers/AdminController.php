<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "Hello";
        return view('admin.login');
    }


    public function auth(Request $request)
    {
        $email= $request->post('email');
        $password= $request->post('password');
        $result = Admin::where(['email'=>$email, 'password'=>$password])->get();
        if(isset($result['0']->id)){
            $request->session()->put('Admin_Login',true);
            $request->session()->put('Admin_Id',$result['0']->id);
            return redirect('admin/dashboard');
        }else{
            $request->session()->flash('error','Please enter a valid login detail');
            return redirect('admin');
        }
    }

    public function dashboard()
    {
        // echo "Hello";
        return view('admin.dashboard');
    }


    
}