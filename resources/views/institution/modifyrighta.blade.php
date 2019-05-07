      {{-- Begin View Right Column A --}}
        <div>
          <div class="card pb-3">
            <div class="card-body alert-dark">
              <h5 class="card-title">Products</h5>
            </div>
            <ul class="list-group list-group-flush pt-3">
              {!! Helper::getcheckboxlist('product', '\App\Product', 'name', isset($item->products) ? $item->products : '', 'productcode', 'code', null, null) !!}
          </div>
        </div>
      {{-- End View Right Column A --}}