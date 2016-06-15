@extends('admin.layout.app' , ['page_title' => 'Booking List'])
@section('content')
  <div class="row">
    <div class="col-md-10">
      <div class="box">
        <div class="box-header with-border">
          Booking
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
                  Email
                </th>
                <th>
                  Phone
                </th>
                <th>
                  Price
                </th>
                <th>
                  Billplz Id
                </th>
                <th>
                  Book Created At
                </th>
                <th>
                  Status
                </th>
                <th>
                  Action
                </th>
                <th>
                  View
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($carts as $cart)
                <tr>
                  <td>
                    {{ $cart->id }}
                  </td>
                  <td>
                    {{ $cart->user->name  }}
                  </td>
                  <td>
                    {{ $cart->user->email }}
                  </td>
                  <td>
                    {{ $cart->user->phone }}
                  </td>
                  <td>
                    {{ $cart->price }}
                  </td>
                  <td>
                    <a href="{{ $cart->billplz_url }}" target="_blank">{{ $cart->billplz_id }}</a>
                  </td>
                  <td>
                    {{ $cart->created_at }}
                  </td>
                  <td>
                    @if($cart->status === '0')
                      <p class="text-danger">
                        Pending
                      </p>
                    @elseif($cart->status === '1')
                      <p class="text-primary">
                        Confirm
                      </p>
                    @elseif($cart->status === '2')
                      <p class="text-success">
                        Success
                      </p>
                    @else
                      <p class="text-warning">
                        Cancel
                      </p>
                    @endif
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <a href="/admin/booking/confirm/{{ $cart->id }}" class="btn btn-success btn-flat">
                        <i class="fa fa-check"></i>
                      </a>
                      <a href="/admin/booking/cancel/{{ $cart->id }}" class="btn btn-danger btn-flat">
                        <i class="fa fa-close"></i>
                      </a>
                      <a href="/admin/booking/success/{{ $cart->id }}" class="btn btn-warning btn-flat">
                        <i class="fa fa-heart"></i>
                      </a>
                    </div>
                  </td>
                  <td>

                    <button class="btn btn-primary" data-toggle="modal" data-target="#{{ $cart->id }}">
                      <i class="fa fa-external-link"></i>
                      View
                    </button>
                  </td>
                </tr>
                <div class="modal fade" id="{{ $cart->id }}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="{{ $cart->id }}">Services</h4>
                      </div>
                      <div class="modal-body">
                        @foreach($cart->cart_item as $item)
                            <div class="row">
                              <div class="col-md-5">
                                {{ $item->product->name }}
                              </div>
                              <div class="col-md-2">
                                {{ $item->book_date }}
                              </div>
                              <div class="col-md-2">
                                {{ $item->book_time }}
                              </div>
                              <div class="col-md-3">
                                {{ $item->product->merchant->name }}
                              </div>
                            </div>
                            <hr>
                        @endforeach
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
              @endforeach
            </tbody>
          </table>


        </div>
      </div>
    </div>
  </div>
@endsection
