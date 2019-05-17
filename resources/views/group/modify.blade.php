  <div class="col-12">
  {{-- Begin Edit and Add Form --}}
    <form action="" method="post">
      <div class="row">
        <div class="col-7">
            {!! Form::token() !!}
 
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Group Code</span>
                </div>
                {!! Form::text('code', ( isset($item->code) ? $item->code : '' ), ['class'=>'form-control', 'placeholder' => 'Code'] ) !!}
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Group Name</span>
                </div>
                {!! Form::text('name', ( isset($item->name) ? $item->name : '' ), ['class'=>'form-control', 'placeholder' => 'Name'] ) !!}
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Sort Number</span>
                </div>
                {!! Form::select('sort', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'], (isset($item->sort) ? $item->sort : '' ), ['class'=>'form-control custom-select']) !!}
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Description</span>
                </div>
                {!! Form::textarea('description', ( isset($item->description) ? $item->description : '' ), ['class'=>'form-control', 'rows' => '2'] ) !!}
              </div>
              {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
              <a href="/{{ (isset($mod) ? $mod : '') }}{{ ( isset($item->code) ? '/' . $item->code . '/view' : ( isset($productcode) ? '/' . $productcode . '/view' : '' ) ) }}{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
            </div>
        </div>
        {{-- End Edit and Add Form --}}
        <div class="col-1">
        </div>  
        <div class="col-4">
          @include($mod . '.modifyrighta')
        <div></div>
          @include($mod . '.modifyrightb')
        </div>
      </div>
    </form>
  {{-- End Edit and Add Form --}}
  </div>  