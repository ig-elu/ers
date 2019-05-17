      {{-- Begin View Form --}}
      <div class="col-7">
        <div class="card">
          <div class="card-body border-bottom">
            <h5 class="card-title">{{ ( isset($item->name) ? $item->name : '' ) }} (for {{ ( isset($obj_a->name) ? $obj_a->name : '' ) }})</h5>
          </div>
          <div class="card-body">
            <p class="card-text">
              <span class="font-weight-bold">Code:</span> {{ ( isset($item->code) ? $item->code : '' ) }}
              <span class="float-right">
                <a href="edit{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                <a href="delete{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}" id="delete"><button type="button" class="btn btn-danger" >Delete</button></a>
                <a href="/product/{{ (isset($item->productcode) ? $item->productcode : '') }}/view{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
              </span>               
            </p>
            <p class="card-text"><span class="font-weight-bold">Description:</span> {{ ( isset($item->description) ? $item->description : '' ) }}</p>

          </div>
        </div>
      </div>
      <div class="col-1">
      </div>  
      <div class="col-4">
        @include($mod . '.viewrighta')
      <div></div>
        @include($mod . '.viewrightb')
      </div>
      {{-- End View Form --}}