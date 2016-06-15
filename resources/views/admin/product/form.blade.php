
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-2">
            {{ Form::select('merchant_id' , $merchant , null  , ['class' => 'form-control']) }}
          </div>
          <div class="col-xs-1">
            {{ Form::select('category_id' , $category , null  , ['class' => 'form-control' , 'placeholder' => 'Category']) }}
          </div>
          <div class="">

          </div>
          <div class="col-xs-2">
            {{ Form::text('name' , null , ['class' => 'form-control', 'placeholder' => 'Name']) }}
          </div>
          <div class="col-xs-2">
            {{ Form::text('service' , null , ['class' => 'form-control ' , 'placeholder' => 'Services']) }}
          </div>
          <div class="col-xs-2">
            {{ Form::text('price' , null , ['class' => 'form-control' , 'placeholder' => 'Price Example : RM 100 => RM10000']) }}
          </div>
          <div class="col-xs-2">
            {{ Form::text('duration' , null , ['class' => 'form-control' , 'placeholder' => 'Duration Example : 60 Mins']) }}
          </div>

          <div class="col-xs-1">
            <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>

          </div>
          <br>
          <br>
          <div class="col-xs-2">
            {{ Form::submit('Save' , ['class' => 'btn btn-success']) }}

          </div>
        </div>
      </div>
