    @if( isset($query) && property_exists($list, 'total'))
        <form action="" method="get">
        <div class="w-50">
          <div class="form-group">
            <div class="input-group has-feedback has-clear mb-3">
              <input type="text" class="form-control" name="query" placeholder="Enter your search term ..." value="{{ ( isset($query) ? $query : '' ) }}">
              <div class="input-group-append">
                <a class="btn btn-danger" href="/{{ (isset($mod) ? $mod : '') }}" title="clear"><i class="material-icons">close</i></a>
                <button class="btn btn-primary" type="submit"><i class="material-icons">search</i></button>
              </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Product</span>
                </div>
                {!! Form::select('productcode', (isset($list_a) ?  $list_a : ''), (isset($item->productcode) ? $item->productcode : [''] ), ['class'=>'form-control custom-select', 'placeholder' => 'Filter by product ...']) !!}
            </div>
             <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Request Status</span>
                </div>
                {!! Form::select('requeststatusid', (isset($list_b) ?  $list_b : ['']), (isset($item->requeststatusid) ? $item->requeststatusid : '' ), ['class'=>'form-control custom-select', 'placeholder' => 'Filter by request status ...']) !!}
            </div>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="archived" class="custom-control-input" id="archived">
              <label class="custom-control-label" for="archived">Search Archived Also</label>
            </div>
           </div> 
        </div>
        </form>
      @endif
      <div class="font-weight-bold pb-3">
      @if( isset($query) && property_exists($list, 'total'))
          {{(($query !== "") ? 'Your query "' . $query . '" has ' : '') }}
          {{(($list->total() !== null) ? $list->total() .' results.' : '') }}
      @endif 
      </div>
