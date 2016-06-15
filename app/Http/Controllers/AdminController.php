<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Merchant;
use App\Category;
use App\User;
use App\Product;
use App\Cart;
use Auth;
class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    public function index(){
      $cart = Cart::where('status' , '0')->where('paid' , '1')->count();
      $user = User::where('role' , '0')->count();
      $product = Merchant::count();
      if(Auth::user()->role === 0){
        return redirect('/');
      }
      return view('admin.index',compact('cart' , 'user' , 'product'));
    }
    public function merchant()
    {
      $merchants = Merchant::paginate(5);
      return view('admin.merchant',compact('merchants'));
    }
    public function category(){
      $categories= Category::all();
      return view('admin.category' , compact('categories'));
    }
    public function add_cat(Request $request){
      $category = new Category();
      $category->name = $request->input('name');
      if ($request->file('image')) {
        $file = $request->file('image');
        $path =  'media';
        $ext =  $file->getClientOriginalExtension();
        $rename =  rand(7217413740 , 23801830184).".".$ext;
        $move = $file->move($path,$rename);
        $category->image = $rename;
      }
      $category->feature = $request->input('feature');
      $category->save();
      return redirect('/admin/category');
    }
    public function del_cat($id){
      $category = Category::find($id);
      $category->delete();
      return redirect('/admin/category');
    }
    public function user_list(){
      $users = User::all();
      return view('.admin.user' , compact('users'));
    }
    public function booking(){
      $carts = Cart::where('paid' , 1)->orderBy('id' , 'desc')->get();
      return view('admin.booking', compact('carts'));
    }
    public function product(){
      $merchant = Merchant::lists('name' , 'id');
      $category = Category::lists('name' , 'id');
      $products = Product::all();
      return view('admin.product' , compact('merchant' , 'category' , 'products' ));
    }
}
