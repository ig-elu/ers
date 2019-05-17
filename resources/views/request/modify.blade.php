  <div class="col-12">
  {{-- Begin Edit and Add Form --}}
    <form action="" method="post">
      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <h5 class="card-title">{!! Form::label('id', 'ID: ') !!} {!! ( isset($item->id) ? $item->id : '' ) !!} &gt;  
                    <span class="text-muted">{{ ( isset($item->title) ? $item->title : '' ) }}</span>
                  </h5>
                </div>
                <div class="col-3">
                  <h4>
                    <span class="float-right badge {!! Helper::getStatusBadgeStyle(isset($item->requeststatus->name) ? $item->requeststatus->name : '' ) !!}">{{(isset($item->requeststatus->name) ? $item->requeststatus->name : '' ) }}</span>
                  </h4>
                </div>
              </div>
              <h5 class="card-subtitle font-weight-bold text-info">{{ ( isset($item->product->name) ? $item->product->name : '' ) }} : {{ ( isset($item->module->name) ? $item->module->name : '' ) }}</h5>
            </div>
            {!! Form::token() !!}
          <div class="form-group">
            {!! Form::hidden('id', ( isset($item->id) ? $item->id : '' )) !!}
          </div>
          <div class="pad-12">

          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Title</span>
              </div>
             <input type="text" name="title" class="form-control" value="{{ ( isset($item->title) ? $item->title : '' ) }}" />
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Request Status</span>
              </div>
            {!! Helper::getdropdown(['name' => 'statuscode', 'model' => '\App\RequestStatuses', 'sort'=> 'name', 'has' => $item->statuscode, 'index' => 'code', 'link' => 'code', 'wherefield' => null, 'whereval' => null]) !!}
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Product</span>
              </div>
            {!! Helper::getdropdown(['name' => 'productcode', 'model' => '\App\Product', 'sort'=> 'name', 'has' => $item->productcode, 'index' => 'code', 'link' => 'code', 'wherefield' => null, 'whereval' => null]) !!}
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Module</span>
              </div>
            {!! Helper::getdropdown(['name' => 'modulecode', 'model' => '\App\Module', 'sort'=> 'name', 'has' => $item->modulecode, 'index' => 'code', 'link' => 'code', 'wherefield' => 'productcode', 'whereval' => $item->productcode]) !!}
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
              </div>
            {!! Form::textarea('description', ( isset($item->description) ? $item->description : '' ), ['class'=>'form-control', 'rows'=>'3', 'placeholder' => 'Description'] ) !!}
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Notes</span>
              </div>
            {!! Form::textarea('notes', ( isset($item->notes) ? $item->notes : '' ), ['class'=>'form-control', 'rows'=>'3', 'placeholder' => 'Notes'] ) !!}
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Private Notes</span>
              </div>
            {!! Form::textarea('privatenotes', ( isset($item->privatenotes) ? $item->privatenotes : '' ), ['class'=>'form-control', 'rows'=>'3', 'placeholder' => 'Private Notes'] ) !!}
          </div>

          @include('request.modifybottom')

          {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
          <a href="/{{ (isset($mod) ? $mod : '') }}{{ ( isset($id) ? '/' . $id . '/view' : (isset($item->id) ? '/' . $item->id . '/view' : '' ) ) }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </div>
    </div>

      {{-- End Edit and Add Form --}}
      <div class="col-1">
      </div>  
      <div class="col-4">
        @include('request.modifyrighta')
        @include('request.modifyrightb')
      </div>
    </div>

    </form>
  {{-- End Edit and Add Form --}}
  </div>  