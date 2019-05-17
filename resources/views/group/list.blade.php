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
                    <div class="col-md-5">
                        <span class="tltp" title="{{ ( isset($item->description) ? $item->description : '' ) }}"><a href="/{{ (isset($mod) ? $mod : '') }}/{{ ( isset($item->code) ? $item->code : '' ) }}/view">{{ ( isset($item->name) ? $item->name : '' ) }}</a></span>
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
