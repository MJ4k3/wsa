@extends('admin.layout.app' , ['page_title' => 'Dashboard'])
@section('content')
    <div class="row">
      <div class="col-md-3">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $cart }}</h3>
            <p>
              New Booking
            </p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $user }}</h3>
            <p>
              Active Users
            </p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $product }}</h3>
            <p>
              Stylist
            </p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
@endsection
