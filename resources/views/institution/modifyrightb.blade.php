      {{-- Begin View Right Column B --}}
      @if (isset($list_b) && !empty($list_b))
        <div class="mt-4">
          <div class="card">
            <div class="card-body alert-dark">
              <h5 class="card-title">User Groups</h5>
            </div>
            <ul class="list-group list-group-flush">
            @foreach ($list_b as $item_b)
              <li class="list-group-item">{{ isset($item_b->name) ? $item_b->name : '' }}</li>
            @endforeach
            </ul>
          </div>
        </div>
      @endif
      {{-- End View Right Column B --}}