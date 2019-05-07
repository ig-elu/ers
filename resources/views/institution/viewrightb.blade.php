      {{-- Begin View Right Column B --}}
        <div class="mt-4">
          <div class="card">
            <div class="card-body alert-dark">
              <h5 class="card-title">User Groups</h5>
            </div>
            <div>
            @foreach ($item->groupList as $gr)
                {{ isset($gr->name) ? $gr->name : '' }}<br />
            @endforeach
            </div>
          </div>
        </div>
      {{-- End View Right Column B --}}