<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Searchy;
use App\Merchant;
use App\Category;
use App\Cart;
Use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['public_search' , 'index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories  = Category::take(5)->get();
        return view('index' , compact('categories'));
    }
    public function public_search(Request $request){
      $search =  $request->input('search');
    //  $merchants = Searchy::search('merchants')->fields('name' , 'address')->query($request->input('search'))->get();
      $merchants = Merchant::where('name' , 'like' , '%'.$search.'%' )->orWhere('address' , 'like' , $search.'%')->get();
      return view('search' , compact('merchants'));
    }
    public function booking(){
      $cart = Cart::where('user_id' , Auth::user()->id)->first();
      return view('setting.booking', compact('cart'));
    }
}
