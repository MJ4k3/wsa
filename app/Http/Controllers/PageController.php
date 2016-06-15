<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Merchant;
class PageController extends Controller
{
    public function taylor()
    {
      return view('taylor' , compact('merchant'));
    }
}
