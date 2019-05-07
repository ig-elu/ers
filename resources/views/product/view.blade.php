      {{-- Begin View Form --}}
      <div class="col-8">
        <div class="card">
          <div class="card-body border-bottom">
            <h5 class="card-title">{{ ( isset($item->name) ? $item->name : '' ) }}</h5>
          </div>
          <div class="card-body">
            <p class="card-text">
              <span class="font-weight-bold">Code:</span> {{ ( isset($item->code) ? $item->code : '' ) }}
              <span class="float-right">
                <a href="edit{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                <a href="delete{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}" id="delete"><button type="button" class="btn btn-danger" >Delete</button></a>
                <a href="/{{ (isset($mod) ? $mod : '') }}/{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
              </span>
            </p>
            <p class="card-text"><span class="font-weight-bold">Description:</span> {{ ( isset($item->description) ? $item->description : '' ) }}</p>
            <p class="card-text"><span class="font-weight-bold">Contact Email:</span> {{ ( isset($item->emailnotifications) ? $item->emailnotifications : '' ) }}</p>

          </div>
        </div>
      </div>
      <div class="col-1">
      </div>  
      <div class="col-3">
        @include($mod . '.viewrighta')
      <div></div>
        @include($mod . '.viewrightb')
      </div>
      {{-- End View Form --}}