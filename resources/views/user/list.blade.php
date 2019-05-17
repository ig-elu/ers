    {{-- Begin Search and List Form --}}
      <div class="col-12"> 
        <div class="float-right"><a href="{{ (isset($mod) ? $mod : '') }}/add"><button type="button" class="btn btn-success">Create {{ (isset($mod) ? ucfirst($mod) : '') }}</button></a></div>
      </div>
      <div class="col-12">
        {!! Form::token() !!}
        @include('components.searchresults')
        @include('components.pagination')
        <div class="col-8">
          <ul class="list-group">
            @foreach ($list as $item)
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-2">
                        <a href="/{{ (isset($mod) ? $mod : '') }}/{{ ( isset($item->username) ? $item->username : '' ) }}/view">{{ ( isset($item->username) ? $item->username : '' ) }}</a>
                    </div>
                    <div class="col-md-3">
                       {{ ( isset($item->name) ? $item->name : '' ) }}
                    </div>
                    <div class="col-md-7">
                       {{ ( isset($item->institution->name) ? $item->institution->name : '' ) }} 
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
