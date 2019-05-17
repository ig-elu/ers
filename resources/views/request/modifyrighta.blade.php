      {{-- Begin View Right Column A --}}
        <div>
          <div class="card">
            <div class="card-body alert-secondary">
              <h5 class="card-title">Requester</h5>
            </div>
            <div class="pad-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Requesting Institution</span>
                </div>
                <input type="text" class="form-control" value=" {{ ( isset($item->institution->name) ? $item->institution->name : '' ) }} " disabled/>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Requester</span>
                </div>
                <input type="text" class="form-control" value=" {{ ( isset($item->requester) ? $item->requester : '' ) }}{{ ( isset($item->requesteremail) ? ', ' . $item->requesteremail : '' ) }}" disabled/>
              </div>
            </ul>
          </div>
        </div>
      {{-- End View Right Column A --}}