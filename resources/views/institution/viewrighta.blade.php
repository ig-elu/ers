      {{-- Begin View Right Column A --}}
        <div>
          <div class="card">
              <div class="card-body alert-dark">
                <h5 class="card-title">Products</h5>
              </div>
              <ul class="list-group list-group-flush">
           @foreach ($item->productList as $pr)
                <li class="list-group-item">{{ isset($pr->name) ? $pr->name : '' }}</li>
            @endforeach
              </ul>
          </div>
        </div>
      {{-- End View Right Column A --}}