      {{-- Begin View Right Column B --}}
          <div class="list-group">
           @foreach ($item->groupList as $gr)
                {{ isset($gr->name) ? $gr->name : '' }}<br />
            @endforeach
          </div>
      {{-- End View Right Column B --}}