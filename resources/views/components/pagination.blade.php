	@if(method_exists($list, 'links'))
        <div class="d-flex justify-content-center">
          {{(($list->links() !== null) ? $list->links() : '') }}
        </div>
    @endif