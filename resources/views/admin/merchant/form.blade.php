        <div class="form-group">
          {{ Form::label('name' , 'Name') }}
          {{ Form::text('name' , null , ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('email' , 'Email') }}
          {{ Form::text('email' , null , ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('address' , 'address') }}
          {{ Form::text('address' , null , ['class' => 'form-control']) }}
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
          {{ Form::label('verify' , 'Verify') }}
          {{ Form::radio('verify' , '1') }}
          {{ Form::label('verify' , 'False') }}
          {{ Form::radio('verify' , '0') }}
        </div>
        <div class="form-group">
          {{ Form::label('description' , 'Description') }}
          {{ Form::textarea('description' , null , ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          <table class="table">
            <thead>
              <tr>
                <th>
                  Day
                </th>
                <th>
                  Open
                </th>
                <th>
                  Close
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  {{ Form::text('day' , null , ['class' => 'form-control']) }}

                </td>
                <td>
                  {{ Form::text('open' , null , ['class' => 'form-control']) }}

                </td>
                <td>
                  {{ Form::text('close' , null , ['class' => 'form-control']) }}

                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="form-group">
          {{ Form::submit($name , ['class' => 'btn btn-primary']) }}
        </div>
