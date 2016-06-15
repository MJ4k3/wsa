@extends('layouts.app')
@section('content')

<section class="detailpage-content">





   <div class="container">
      <div class="row">


         <div class="col-md-8">


         <div class="col-md-12">
            <div class="row">
               @foreach($merchant->picture as $picture)
               <div class="col-md-3 ">
                  <a href="#" class="thumbnail">
                  <img src="{{ asset('/media') }}/{{$picture->image}}" >
                  </a>
               </div>
               @endforeach



            </div>
      </div>

            <h4>{{ $merchant->name }}</h4>
            <p>{{ $merchant->description }}</p>
            <span class="label label-default">Aesthetics</span>
            {{ $merchant->category_merchant }}
            <hr>
            <h4>Services</h4>
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title">EXTENSIONS</h3>
               </div>
               @foreach($merchant->product as $product)
                   <div class="panel-body">
                      <div class="col-md-8">
                        <p style="color:black">
                          {{ $product->name }}
                        </p>
                         {{ $product->service }} <br>
                         {{ $product->duration  }}
                      </div>
                      <div class="col-md-4">
                         <strike></STRIKE> RM {{ str_replace("." , " " , $product->price) }}<a href="{{ action('BookingController@add_book' , $product->id) }}" class="btn book-btn pull-right">BOOK</a>
                      </div>
                   </div>
                   <hr>
               @endforeach
            </div>
         </div>
         <div class="col-md-4">
            <div class="row">
               <div class="col-md-12 ">
                
<p>
<strong>{{ $merchant->name }}</strong><br>
{{ $merchant->address }}
</p>

               </div>
            </div>
         </div>















      </div>
   </div>
</section>
@endsection
