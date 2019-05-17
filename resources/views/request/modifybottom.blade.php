      {{-- Begin View Bottom --}}
        <div class="card mb-3 border-ppd-grey">
          <div class="card-header ppd-grey border-ppd-grey mb-3">Content</div>
          <div class="pad-12">
          <div class="input-group mb-3">
            <span class="input-group-prepend">
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="language_specific" id="language_specific" value="1" {{ ( isset($item->language_specific) ? (($item->language_specific === 1) ? ' checked="checked"' : '' ) : '' ) }}>{{ ( isset($item->language_specific) ? $item->language_specific  : 'null' ) }}
                <label class="custom-control-label" for="language_specific">Regional Language</label>
              </div>
            </span>
            <div class="input-group-prepend pl-4">
              <span class="input-group-text conditional hidden">Language</span>
            </div>
            {!! Helper::getdropdown(['name' => 'regionalcode', 'model' => '\App\RequestRegionalCodes', 'sort'=> 'name', 'has' => $item->regionalcode, 'index' => 'code', 'link' => 'code', 'wherefield' => null, 'whereval' => null, 'classes' => 'conditional hidden', ]) !!}
          </div>
      	</div>
        </div>
      {{-- End View Bottom --}}