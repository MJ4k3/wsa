@extends('admin.layout.app' , ['page_title' => 'Stylo'])
@section('content')
    <div class="row">
      <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
            <h3>Stylos List</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  Name
                </th>
                <th>
                  Address
                </th>
                <th>
                  Posted
                </th>
                <th>
                  Verify
                </th>
                <th>
                  Category
                </th>
                <th>
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($merchants as $merchant)
                <tr>
                  <td>
                    {{ $merchant->name }}
                  </td>
                  <td>
                    {{ $merchant->address }}
                  </td>
                  <td>
                    {{ $merchant->created_at }}
                  </td>
                  <td>
                    @if($merchant->verify === 0)
                      <a href="#" class="text-danger"><i class="fa fa-check"></i></a>
                    @else
                      <a href="#" class="text-success"><i class="fa fa-check"></i></a>
                    @endif
                  </td>
                  <td>
                  </td>
                  <td>
                    <div class="btn-group">
                      <a href="/stylo/{{ $merchant->slug }}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                      <a href="merchant/edit/{{ $merchant->slug }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(['action' => ['MerchantController@destroy' , $merchant->id] , 'method' => 'DELETE' ]) }}
                        {!! Form::submit("Delete", ['class' => 'btn btn-default']) !!}
                      {{ Form::close() }}
                    </div>
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
            {{ $merchants->links() }}
        </div>
      </div>
      </div>
    </div>
@endsection
