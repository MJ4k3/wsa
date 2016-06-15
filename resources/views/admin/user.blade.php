@extends('admin.layout.app' , ['page_tile' => 'Users'])
@section('content')
    <div class="row">
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            User List
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
                    Created At
                  </th>
                  <th>
                    Role
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>
                      {{ $user->id }}
                    </td>
                    <td>
                      {{ $user->name }}
                    </td>
                    <td>
                      {{ $user->email }}
                    </td>
                    <td>
                      {{ $user->created_at }}
                    </td>
                    <td>
                      @if($user->role === 0)
                        <p class="text-primary">
                            User
                        </p>
                      @elseif($user->role === 1)

                      @elseif($user->role === 2)
                        <p class="text-danger">
                           Admin
                        </p>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
