    {{-- Begin Search and List Form --}}
      <div class="col-12"> 
        <div class="float-right"><a href="{{ (isset($mod) ? $mod : '') }}/add"><button type="button" class="btn btn-success">Create {{ (isset($mod) ? ucfirst($mod) : '') }}</button></a></div>
      </div>
      <div class="col-12">
        {!! Form::token() !!}
        @include('ers.components.searchresults')
        @include('ers.components.pagination')
        <div>
          <ul class="list-group">
            @foreach ($list as $item)
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-5">
                        <a href="/{{ (isset($mod) ? $mod : '') }}/{{ ( isset($item->code) ? $item->code : '' ) }}/view">{{ ( isset($item->name) ? $item->name : '' ) }}</a>
                    </div>
                    <div>
                      <span class="badge badge-primary"  data-toggle="collapse" data-target="#{{ ( isset($item->code) ? $item->code : '' ) }}" aria-expanded="false" aria-controls="collapseExample">
                        See description
                      </span>
                    </div>
                  </div>
                  <div class="collapse" id="{{ ( isset($item->code) ? $item->code : '' ) }}">
                    <div class="card card-body w-50">
                      {{ ( isset($item->description) ? $item->description : '' ) }}
                    </div>
                  </div>
                </li>
            @endforeach
          </ul>
        </div>
        <div class="d-flex justify-content-center pt-3">
        @include('ers.components.pagination')
        </div>
      </div> 
      {{-- End Search and List Form --}}
