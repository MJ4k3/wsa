<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Merchant;
use App\Product;
use Auth;
use App\Cart;
use App\Cart_Item;
use App\Time;
use Kidino\Billplz\Billplz;
use App\User;
use GuzzleHttp\Client;

class BookingController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    public function index_cart($id){
      $cartitems = Cart_Item::where('cart_id' ,$id)->get();
      $cart =  Cart::where('user_id' , Auth::user()->id)->where('paid',0)->orderBy('id' , 'desc')->first();
      if (!$cart) {
          $cart  = new Cart();
          Auth::user()->cart()->save($cart);
      }elseif($cart->paid === 1){
        $cart  = new Cart();
        Auth::user()->cart()->save($cart);
        return redirect('/cart/'.$cart->id);
      }else{
        $items = $cart->Cart_Item;
        $total = 0;
        foreach ($items as $item) {
          $total+=$item->product->price;
        }
      }
      return view('book.index' , compact('cartitems' , 'total' , 'cart'));
    }
    public function add_cart(Request $request ,  $id){
      $cart =  Cart::where('user_id' , Auth::user()->id)->orderBy('id' , 'desc')->first();
      if (!$cart) {
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->save();
      }elseif($cart->paid === 1){
        $cart  = new Cart();
        Auth::user()->cart()->save($cart);
      }
      $cartitem = new Cart_Item();
      $cartitem->product_id = $id;
      $cartitem->cart_id = $cart->id;
      $cartitem->book_date = $request->input('book_date');
      $cartitem->book_time = $request->input('book_time');
      $cartitem->save();
      return redirect()->action("BookingController@index_cart" , $cart->id);
    }
    public function add_book($id){
      $item = Product::find($id)->first();
      $times = Time::lists('time', 'time');
      $cart = Cart_Item::where('product_id',$id)->value('book_time');
      return view('book.book' , compact('item' , 'times' , 'cart'));
    }
    public function del_book($id){
      $cartitem = Cart_Item::find($id);
      $cartitem->delete();
      return redirect()->action('BookingController@index_cart' , $cartitem->cart_id);
    }
    public function checkout(Request $request , $id){
      $user = User::find(Auth::user()->id);
      $user->phone = $request->input('phone');
      $user->save();
      $cart = Cart::find($id);
      $cart->price = $request->input('price');
      $cart->save();
      if ($request->input('pay') === 'cod') {
        return  $this->pay_cod($id);
      }elseif($request->input('pay') === 'fpx'){
          return $this->pay_fpx($id);
      }
    }
    public function pay_cod($id){
      $cart = Cart::find($id);
      $cart->price =
      $cart->paid = 1;
      $cart->save();
      return redirect('/setting/booking');
    }
    public function pay_fpx($id){
      $cart = Cart::find($id);
      $fpx =  new Billplz(['api_key' => '0ce8bd21-0c49-46e1-bd3e-920c23a808de']);
      if (empty($cart->collection_id)) {
        $fpx->set_data('title' , 'Booking Id #00'.$cart->id);
        $result = $fpx->create_collection();
        $response = json_decode($result);
        $cart->collection_id = $response->id;
        $cart->save();
      }
      if (empty($cart->billplz_id)) {
        $fpx->set_data([
          'collection_id' => $cart->collection_id,
          'email' => Auth::user()->email,
          'name' => Auth::user()->name,
          'phone' => Auth::user()->phone,
          'amount' => $cart->price,
          'callback_url' => 'http://getwsa.com/checkout/success',
          'redirect_url' => 'http://getwsa.dev/checkout/success',
        ]);
        $json = $fpx->create_bill();
        $res = json_decode($json);
        $cart->billplz_id = $res->id;
        $cart->billplz_url = $res->url;
        $cart->save();
        return redirect($res->url);
      }else{
        return redirect($cart->billplz_url);
      }

    }
    public function success(Request $request){
      $fpx =  new Billplz(['api_key' => '0ce8bd21-0c49-46e1-bd3e-920c23a808de']);
      $billid = $request->input('billplz');
      $result = $fpx->get_bill($billid['id']);
      $response = json_decode($result);
      $cart = Cart::where('billplz_id' , $response->id)->first();
      if ($response->paid === true) {
        $cart->paid =  1;
        $cart->save();
        $this->success_message($cart->id);
      }

      return redirect('/setting/booking');
    }
    public function success_message($id){
        $cart = Cart::find($id)->first();
        $client = new Client();
        $mobileno = $cart->user->phone;
        $message = "WeStyleAsia : Hi ".$cart->user->name.", we have received your booking id #00".$cart->id.".Confirmation will be send within 24 hours. Thank you for your patience.";
        $response =  $client->request('POST',"http://gateway.onewaysms.com.my:10001/api.aspx?apiusername=API647WRQCJBK&apipassword=API647WRQCJBK647WR&mobileno=".$mobileno."&senderid=teambacen&languagertype=1&message=".$message);
    }
}
