      {{-- Begin View Right Column A --}}
      @if ((isset($list_a) && !empty($list_a)) || (isset($obj_a) && !empty($obj_a)))
        <div>
          <div class="card">
              <div class="card-body alert-secondary">
                <h5 class="card-title ">Requester</h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="font-weight-bold">Requesting Institution:</span> {{ ( isset($obj_a->institution->name) ? $obj_a->institution->name : '' ) }}</li>
                <li class="list-group-item"><span class="font-weight-bold">Requester:</span> {{ ( isset($item->requester) ? $item->requester .', ' : '' ) }}{{ ( isset($item->requesteremail) ? $item->requesteremail : '' ) }}</li>
              </ul>
          </div>
        </div>
      @endif
      {{-- End View Right Column A --}}