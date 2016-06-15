<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cart;
use GuzzleHttp\Client;

class AdbookController extends Controller
{
    public function status($type , $id){
      $cart = Cart::find($id);
      $client = new Client();
      switch ($type) {
        case 'pending':
          # code...
            $cart->status = '0';
            $cart->save();
            $message = "Pending";
          break;
        case 'confirm':
          # code...
            $cart->status = '1';
            $cart->save();
            $message = "WeStyleAsia : Hi ".$cart->user->name.", we have confirmed your booking id ".$cart->id." with WeStyleAsia. Do check this link link  for your booking details.";
          break;
        case 'success':
          # code...
            $cart->status = '2';
            $cart->save();
            $message = "Success";
          break;
        case 'cancel':
          # code...
            $cart->status = '3';
            $cart->save();
            $message = "WeStyleAsia : We are sorry to hear about your cancellation on booking id ".$cart->id." . You will be refunded within 24 hours. We hope to hear from you again.";
          break;

      }
      $response = $client->request('POST','http://gateway.onewaysms.com.my:10001/api.aspx?apiusername=API647WRQCJBK&apipassword=API647WRQCJBK647WR&mobileno='.$cart->user->phone.'&senderid=WeStyleAsia&languagertype=1&message='.$message);
      //return $response->getBody();
      return redirect()->action('AdminController@booking');
    }

}
