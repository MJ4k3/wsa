@extends('admin.layout.app' , ['page_title' => 'Category'] )
@section('content')
    <div class="row">
      <div class="col-md-8">
        <div class="box">
          <div class="box-header with-border">
            Category List
          </div>
          <div class="box-body">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    Id
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <td>
                    {{ $category->id }}
                  </td>
                  <td>
                    {{ $category->name }}
                  </td>
                  <td>
                    {{ Form::open(['action' => ['AdminController@del_cat' , $category->id] , 'method' => 'DELETE' , 'files' => 'true']) }}
                        <div class="form-group">
                          {{ Form::submit('Delete' , ['class' => 'btn btn-default']) }}
                        </div>
                    {{ Form::close() }}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box">
          <div class="box-header with-border">
            Add Category
          </div>
          <div class="box-body">
            {{ Form::open(['action' => 'AdminController@add_cat']) }}
                <div class="form-group">
                  {{ Form::text('name',null,['class' => 'form-control' , 'placeholder' => 'Category Name']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('image' , 'Image') }}
                  {{ Form::file('image') }}
                </div>
                <div class="form-group">
                  {{ Form::label('feature' , 'Featured At Main Page') }}
                  {{ Form::radio('feature' , true) }}
                  {{ Form::label('feature' , 'False') }}
                  {{ Form::radio('feature' , false) }}
                </div>
                {{ Form::submit('Save' , ['class' => 'btn btn-success']) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
@endsection
