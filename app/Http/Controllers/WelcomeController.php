<?php
namespace App\Http\Controllers;
use App\Models\User;
use Session;
class WelcomeController extends Controller{
    public function index()
    { 
        $users= User::with('profile.country:name')->get();
        Session::put('user_name','Chandan singh');
       return view('welcome',compact('users'));
    }
}
