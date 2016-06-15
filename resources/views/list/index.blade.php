@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="col-md-6 col-md-offset-3">
        <h2>List Stylist</h2>
        {{ Form::open(['action' => 'ListController@store' , 'files' => true]) }}
           <div class="form-group">
             {{ Form::label('name' , 'Your Saloon Name') }}
             {{ Form::text('name', null , ['class' => 'form-control']) }}
           </div>
           <div class="form-group">
             {{ Form::label('email', 'Contact Email') }}
             {{ Form::text('email' , null , ['class' => 'form-control']) }}
           </div>
           <div class="form-group">
             {{ Form::label('number' , 'Contact Number') }}
             {{ Form::text('number' , null , ['class' => 'form-control']) }}
           </div>
           <div class="form-group">
             {{ Form::label('address' , 'Shop Address') }}
             {{ Form::text('address' , null , ['class' => 'form-control']) }}
           </div>
           <div class="form-group">
             {{ Form::label('location' , 'Location' ) }}
             {{ Form::text('location' , null  , ['class' => 'form-control']) }}
           </div>
           <div class="form-group">
             {{ Form::label('category' , 'Category') }}
             {{ Form::select('category' , $category , null , ['class' => 'form-control' , 'placeholder' => 'Select Category' , 'multiple' => 'true']) }}
           </div>
           <div class="form-group">
             {{ Form::label('operating' , 'Operating Hour') }}
             <table>
               <tbody>
                 <tr>
                   <td>
                     {{ Form::text('day' , null , ['class' => 'form-control' , 'placeholder' => 'Day']) }}
                   </td>
                   <td>
                     {{ Form::text('open' , null , ['class' => 'form-control' , 'placeholder' => 'Open Hour']) }}
                   </td>
                   <td>
                     {{ Form::text('close' , null , ['class' => 'form-control' , 'placeholder' => 'Close Hour']) }}
                   </td>
                 </tr>
               </tbody>
             </table>
           </div>
           <div class="form-group">
             {{ Form::label('description' , 'Description') }}
             {{ Form::textarea('description' , null , ['class' => 'form-control']) }}
           </div>
           <div class="form-group">
             {{ Form::label('facebook' , 'Facebook') }}
             {{ Form::text('facebook' , null , ['class' => 'form-control']) }}
           </div>
           <div class="form-group">
             {{ Form::label('instagram' , 'Instagram') }}
             {{ Form::text('instagram' , null , ['class' => 'form-control']) }}
           </div>
           <div class="form-group">
             {{ Form::label('logo' , 'Logo Or Picture') }}
             {{ Form::file('logo') }}
           </div>
           <div class="form-group">
             {{ Form::label('service' , 'Upload Service List') }}
             {{ Form::file('service') }}
           </div>
           <div class="form-group">
             {{ Form::label('picture' , 'Shop Interior And Exterior') }}
             {{ Form::file('picture[]' , ['multiple' => true]) }}
           </div>
           <div class="form-group">
              {{ Form::submit('List Your Salon' , ['class' => 'btn btn-success btn-block']) }}
           </div>
        {{ Form::close() }}
      </div>
  </div>
@endsection
