      {{-- Begin View Form --}}

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
            <div class="pad-12">
            <p class="card-text">
              <span class="float-right">
                <a href="edit{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                <a href="delete{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}" id="delete"><button type="button" class="btn btn-danger" >Delete</button></a>
                <a href="/{{ (isset($mod) ? $mod : '') }}/{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
              </span>
            </p>
            <p class="card-text">
              <div><span class="font-weight-bold">Version:</span> {{ ( isset($item->productversion) ? $item->productversion : '' ) }}</div>
            </p>
            <p class="card-text">
              <div><span class="font-weight-bold">Keywords:</span> {{ ( isset($item->keywords) ? $item->keywords .', ' : '' ) }}</div>
              <div><span class="font-weight-bold">Description:</span> {!! ( isset($item->description) ? $item->description .', ' : '' ) !!}</div>
            </p> 
            <p class="card-text"><span class="font-weight-bold">Notes:</span> {{ ( isset($item->notes) ? $item->notes : '' ) }}</p>
            <p class="card-text"><span class="font-weight-bold">Private Notes:</span> {{ ( isset($item->privatenotes) ? $item->privatenotes : '' ) }}</p>
          </div>
          </div>
      </div>
      <div class="col-1">
      </div>  
      <div class="col-4">
        @include('request.viewrighta')
        @include('request.viewrightb')
       </div>
      {{-- End View Form --}}