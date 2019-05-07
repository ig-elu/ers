      {{-- Begin View Right Column A --}}
      @if (isset($list_a) && !empty($list_a))
        <div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
            </div>
            <ul class="list-group list-group-flush">
            @foreach ($list_a as $item_a)
              <li class="list-group-item"></li>
            @endforeach
            </ul>
          </div>
        </div>
      @endif
      {{-- End View Right Column A --}}