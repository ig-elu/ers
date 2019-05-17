      {{-- Begin View Bottom --}}
        <div class="card mb-3 border-ppd-grey">
            <div class="card-header ppd-grey border-ppd-grey">User Groups</div>
            <ul class="list-group list-group-flush">
              {!! Helper::getcheckboxlist('group', '\App\Group', 'sort', isset($item->usergroups) ? $item->usergroups : '', 'groupcode', 'code', null, null) !!}
            </ul>
        </div>
      {{-- End View Bottom --}}