@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1>{{ $item->name }}</h1>
        {{ Form::open(['action' => ['BookingController@add_cart' , $item->id] ]) }}
          <div class="form-group">
            {{ Form::date('book_date' , \Carbon\Carbon::now() , ['class' => 'form-control']) }}


          </div>
          <div class="form-group">

              {{  Form::select('book_time' , $times , null , ['class' => 'form-control']) }}

          </div>
          {{ Form::submit('Book Date ' , ['class' => 'btn btn-success btn-block']) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
@endsection
