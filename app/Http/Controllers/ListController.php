<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Merchant;
use App\Category_Merchant;
use App\Category;
use App\Picture;
use App\Operating;
class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::lists('name' , 'id');
        return view('list.index' , compact('category'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $merchant = new Merchant;
        if ($request->file('service')) {
          $file = $request->file('service');
          $path = 'media';
          $ext = $file->getClientOriginalExtension();
          $rename =  rand(243244 , 234456464).".".$ext;
          $move = $file->move($path,$rename);
          $merchant->service = $rename;
        }
        if ($request->file('logo')) {
          $file = $request->file('logo');
          $path = 'media';
          $ext = $file->getClientOriginalExtension();
          $rename =  rand(243244 , 234456464).".".$ext;
          $move = $file->move($path,$rename);
          $merchant->logo = $rename;
        }
        $merchant->name = $request->input('name');
        $merchant->email = $request->input('email');
        $merchant->number = $request->input('number');
        $merchant->address = $request->input('address');
        $merchant->facebook = $request->input('facebook');
        $merchant->instagram = $request->input('instagram');
        $merchant->location = $request->input('location');
        $merchant->description = $request->input('description');
        $merchant->slug = strtolower(str_replace(" ","-" , $request->input('name')));
        $merchant->save();
        if($request->file('picture')){
          $files = $request->file('picture');
          foreach ($files as $file) {
            # code...
            $picture = new Picture;
            $path =  'media';
            $ext =  $file->getClientOriginalExtension();
            $rename =  rand(7217413740 , 23801830184).".".$ext;
            $move = $file->move($path,$rename);
            $picture->merchant_id = $merchant->id;
            $picture->image =  $rename;
            $picture->save();
          }
        }
        $category = new Category_Merchant;
        $category->merchant_id = $merchant->id;
        $category->category_id = $request->input('category');
        $category->save();
        $operating = new Operating;
        $operating->day = $request->input('day');
        $operating->open = $request->input('open');
        $operating->close = $request->input('close');
        $merchant->operating()->save($operating);
        return view('list.thank');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
