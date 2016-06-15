@extends('layouts.app')
@section('content')
  <div class="container" style="padding-top:80px; padding-bottom:300px;">
    <div class="row">
      <div class="col-md-8">
        <h2 style="padding-bottom:50px;">My Booking List</h2>
        <table class="table">
          <thead>
            <tr>
              <th>
                Booking Id
              </th>
              <th>
                Status
              </th>
              <th>
                Paid
              </th>
              <th>
                Book Created At
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                {{ $cart->id }}
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
                @if($cart->paid === 0)
                 <p>
                   Unpaid
                 </p>
                @else
                  <p>
                    Paid
                  </p>
                @endif
              </td>
              <td>
                {{ $cart->created_at }}
              </td>
              <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#{{ $cart->id }}">
                  <i class="fa fa-external-link"></i>
                  View
                </button>
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
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
