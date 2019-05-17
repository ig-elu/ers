    {{-- Begin Search and List Form --}}
      <div class="col-12"> 
        <div class="float-right"><a href="{{ (isset($mod) ? $mod : '') }}/add"><button type="button" class="btn btn-success">Create {{ (isset($mod) ? ucfirst($mod) : '') }}</button></a></div>
      </div>
      <div class="col-10">
        {!! Form::token() !!}
        @include('request.searchresultsrequest')
        @include('components.pagination')
        <div>
          <ul class="list-group">
          @foreach ($list as $item)
            <li class="list-group-item">
              <div class="row">
                  <div class="col-md-1">
                    {{ ( isset($item->id) ? $item->id : '' ) }}
                  </div>
                  <div class="col-md-1">
                    {{ ( isset($item->product->name) ? $item->product->name : '' ) }}
                  </div>
                  <div class="col-md-6">
                  <span>
                    <span  class="tltp" title="{{ ( isset($item->description) ? $item->description : '' ) }}"><a href="/{{ (isset($mod) ? $mod : '') }}/{{ ( isset($item->id) ? $item->id : '' ) }}/view{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}">{{ ( isset($item->title) ? $item->title : '' ) }}</a></span>
                  </span>
                </div>
                <div>
                </div>
                <div class="col-md-2">
                  {{ ( isset($item->requeststatuses->name) ? $item->requeststatuses->name : '' ) }}
                </div>
              </div>
            </li>
          @endforeach
          </ul>
        </div>
        <div class="d-flex justify-content-center pt-3">
        @include('components.pagination')
        </div>
      </div> 
      {{-- End Search and List Form --}}
