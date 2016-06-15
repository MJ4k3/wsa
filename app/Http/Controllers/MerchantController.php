<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Merchant;
use App\Operatitng;
class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
      $this->middleware('auth' , ['except' => ['index' , 'show']]);
    }
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $merchant =  Merchant::findBySlugOrId($id);
      return view('detail' , compact('merchant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $merchant =  Merchant::findBySlugOrId($id);
      return view('admin.merchant.edit' , compact('merchant'));
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
        $merchant =  Merchant::findBySlugOrId($id);
        $merchant->update($request->all());
        return redirect('/admin/merchant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $merchant = Merchant::findBySlugOrId($id);
      $merchant->delete();
      return redirect('/admin/merchant');
    }
}
