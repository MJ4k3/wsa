@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <h2 class="text-center">Order Booking</h2>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center">1. ORDER SUMMARY</h3>
          </div>
          <div class="panel-body">
            <p>
              Service
            </p>
            <hr>
            @foreach($cartitems as $item)
              <h5> <strong>{{ $item->product->name }}</strong></h5>
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <p>
                        <strong>Salon </strong>
                      </p>
                    </td>
                    <td>
                      <p>
                        {{ $item->product->merchant->name }}
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>
                        <strong>Location </strong>
                      </p>
                    </td>
                    <td>
                      <p>
                        {{ $item->product->merchant->address }}
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>
                        <strong>Booking</strong>
                      </p>
                    </td>
                    <td>
                      <p>
                        Time : {{ $item->book_time }}
                      </p>
                      <p>
                        Date : {{ $item->book_date }}
                      </p>
                    </td>
                  </tr>

                </tbody>
              </table>
            @endforeach
            <hr>
            <h4><strong>Total : RM {{ $total }}</strong></h4>
          </div>

        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center">2. YOUR DETAILS</h3>
          </div>
          <div class="panel-body">
            {{ Form::open(['action' => ['BookingController@checkout' , $cart->id]]) }}
              <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name' , Auth::user()->name , ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('email' , 'Email') }}
                {{ Form::text('email' , Auth::user()->email  , ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                @if(empty(Auth::user()->phone))
                  {{ Form::label('phone' , 'Phone') }}
                  {{ Form::text('phone' ,null  , ['class' => 'form-control']) }}
                @else
                  {{ Form::label('phone' , 'Phone') }}
                  {{ Form::text('phone' , Auth::user()->phone  , ['class' => 'form-control']) }}
                @endif
              </div>
          </div>
          <br>
          <br>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center">3. PAYMENT DETAILS</h3>
          </div>
          <div class="panel-body">
            <h4><strong>SELECT PAYMENT METHOD:</strong></h4>
            <div class="form-group">
              <div class="btn-group btn-group-sm">

                {{ Form::radio('pay' , 'fpx') }}
                {{ Form::label('fpx' , 'PAY WITH LOCAL BANK') }}
                <br>

              </div>
              {{ Form::submit('Checkout' , ['class' => 'btn btn-success btn-block']) }}
            </div>
            {{ Form::close() }}
          </div>

        </div>
        <h4 style="color:red; font-weight:bold;">*Once booking is made, kindly collect your Student Loyalty Card from the Taylor's Student Council Office.</h4>
      </div>
    </div>

  </div>
@endsection
