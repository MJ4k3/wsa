@extends('admin.layout.app' , ['page_title' => 'Product'])
@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            Add Product
          </div>
          <div class="box-body">
            {{ Form::open(['action' => 'ProductController@store' , 'class' => 'form-inline' , 'files' => true]) }}
                {{ Form::file('service') }}
                {{ Form::submit('Save' , ['class' => 'btn btn-success']) }}
            {{ Form::close() }}

          </div>
        </div>
      </div>
    </div>

@endsection
