@extends('layouts.app')
@section('content')
  <section class="content-8 result-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          @foreach($merchants as $merchant)
            <div class="col-md-3 ">

            <div class="thumbnail">
              @if($merchant->logo)
                <a href="{{ action('MerchantController@show' , $merchant->slug) }}"><img src="{{ asset('/media') }}/{{ $merchant->logo }}"></a>
              @else
                <a href="{{ action('MerchantController@show' , $merchant->slug) }}"><img src="https://placehold.it/350x350"></a>
              @endif
              <div class="caption text-left">
              <h5><a href="{{ action('MerchantController@show' , $merchant->slug) }}">{{ $merchant->name }}</a></h5>
              <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet suscipit diam.</p>-->
              <a href="">Atmosphere Hair Salon </a>
              <br>
              <a href="">{{ $merchant->location }}</a>
              <p><a href="{{ action('MerchantController@show' , $merchant->slug) }}" class="btn btn-primary btn-cta-result" role="button">Check Services & Availability</a> </p>
              </div>
              </div>
            </div>
          @endforeach
        </div>


      </div>
    </div>
  </section>
@endsection
