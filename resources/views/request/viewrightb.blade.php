      {{-- Begin View Right Column B --}}
      @if ((isset($list_b) && !empty($list_b)) || (isset($obj_b) && !empty($obj_b)))
        <div class="mt-4">
          <div class="card">
            <div class="card-body alert-secondary">
              <h5 class="card-title">{{ config('app.vendor') }}</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><span class="font-weight-bold">Problem No:</span> {{(isset($obj_b->vendorproblemno) ? $obj_b->vendorproblemno : '' ) }}</li>
              <li class="list-group-item"><span class="font-weight-bold">Incident No:</span> {{(isset($obj_b->vendorincidentno) ? $obj_b->vendorincidentno : '' ) }}</li>
              <li class="list-group-item"><span class="font-weight-bold">{{ config('vendor.name') }} Status:</span> {{(isset($obj_b->vendorstatus->name) ? $obj_b->vendorstatus->name : '' ) }}</li>
              <li class="list-group-item"><span class="font-weight-bold">Complexity Points:</span> {{(isset($obj_b->vendorcomplexitypoints) ? $obj_b->vendorcomplexitypoints : '' ) }}</li>
              <li class="list-group-item"><span class="font-weight-bold">Explanation:</span> {{(isset($obj_b->vendorcomplexitypointsexplanation) ? $obj_b->vendorcomplexitypointsexplanation : '' ) }}</li>

            </ul>
          </div>
        </div>
      @endif
      {{-- End View Right Column B --}}