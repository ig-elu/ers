      {{-- Begin View Right Column B --}}
        <div class="mt-4">
          <div class="card">
            <div class="card-body alert-secondary">
              <h5 class="card-title">{{ config('app.vendor') }}</h5>
            </div>
            <div class="pad-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Problem #</span>
                </div>
                <input type="text" class="form-control" name="vendorproblemno" value=" {{ ( isset($item->vendorproblemno) ? $item->vendorproblemno : '' ) }} " />
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Incident #</span>
                </div>
                <input type="text" class="form-control" name="vendorincidentno" value=" {{ ( isset($item->vendorincidentno) ? $item->vendorincidentno : '' ) }} " />
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">{{ config('vendor.name') }} Status</span>
                </div>
                {!! Helper::getdropdown(['name' => 'vendorstatuscode', 'model' => '\App\RequestVendorStatuses', 'sort'=> 'name', 'has' => $item->vendorstatuscode, 'index' => 'code', 'link' => 'code', 'wherefield' => null, 'whereval' => null]) !!}
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Complexity Pts</span>
                </div>
                <input type="text" class="form-control" name="vendorcomplexitypoints" value=" {{ ( isset($item->vendorcomplexitypoints) ? $item->vendorcomplexitypoints : '' ) }} " />
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Explanation</span>
                </div>
                <input type="text" class="form-control" name="vendorcomplexitypointsexplanation" value=" {{ ( isset($item->vendorcomplexitypointsexplanation) ? $item->vendorcomplexitypointsexplanation : '' ) }} " />
              </div>
          </div>
        </div>
      {{-- End View Right Column B --}}