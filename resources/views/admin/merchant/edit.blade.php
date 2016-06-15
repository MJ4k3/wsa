@extends('admin.layout.app' , ['page_title' => 'Edit Stylo'])
@section('content')
    <div class="row">
      {{ Form::model($merchant , ['action' => ['MerchantController@update' , $merchant->slug] ]) }}
        <div class="col-md-8">
          <div class="box">
            <div class="box-header with-border">
              <h3>Edit {{ $merchant->name }}</h3>
            </div>
            <div class="box-body">
              @include('admin.merchant.form' , ['name' => 'Update'])
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <div class="box-header with-border">
              <h4>Feature Image</h4>
            </div>
            <div class="box-body">
              @if(empty($merchant->logo))
                {{ Form::label('logo' , 'Upload Feature Image') }}
                {{ Form::file('logo') }}
              @else
                <img src="http://westyleasia.dev/media/{{$merchant->logo}}" class="img-responsive" alt="" />
                {{ Form::label('logo' , 'Upload Feature Image') }}
                {{ Form::file('logo') }}
              @endif
            </div>
          </div>
          <div class="box">
            <div class="box-header with-border">
              <h4>Interior And Exterior Picture</h4>
            </div>
            <div class="box-body">

                @foreach($merchant->picture as $picture)
                  {{ $picture->image }}
                @endforeach
                <br>
                {{ Form::label('picture' , 'Add') }}
                {{ Form::file('picture[]') }}
            </div>
          </div>
          <div class="box">
            <div class="box-header with-border">
              <h4>Service</h4>
            </div>
            <div class="box-body">
                <img src="http://westyleasia.dev/media/{{ $merchant->service }}" class="img-responsive" alt="" />

            </div>
          </div>
        </div>
        {{ Form::close()  }}
    </div>
@endsection
