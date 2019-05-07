    @if( isset($query) && property_exists($list, 'total'))
        <form action="" method="get">
        <div class="w-50">
          <div class="form-group">
            <div class="input-group has-feedback has-clear">
              <input type="text" class="form-control" name="query" placeholder="Enter your search term ..." value="{{ ( isset($query) ? $query : '' ) }}">
              <div class="input-group-append">
                <a class="btn btn-danger" href="/{{ (isset($mod) ? $mod : '') }}" title="clear" role="button"><i class="material-icons">close</i></a>
              </div>
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><span class="material-icons">search</span></button>
              </div>  
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
