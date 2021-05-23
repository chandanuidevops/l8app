<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Harimayco\Menu\Facades\Menu;
use Illuminate\Contracts\Encryption\DecryptException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->isMethod('post')){
            $user=$request->user();
            $user->api_token=Str::random(80);
            $user->secret=encrypt($request->secret);
            $user->save();
            return redirect('/home');
        }
        try {
            $secret = decrypt(auth()->user()->secret);
        } catch (DecryptException $e) {
            $secret='N/A or modified';
        }
        $public_menu = Menu::getByName('default-menu');
        return view('home',compact('secret','public_menu'));
    }
}
