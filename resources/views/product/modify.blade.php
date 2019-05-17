  <div class="col-12">
  {{-- Begin Edit and Add Form --}}
    <form action="" method="post">
      <div class="row">
        <div class="col-7">
            {!! Form::token() !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Product Code</span>
                </div>
              {!! Form::text('code', ( isset($item->code) ? $item->code : '' ), ['class'=>'form-control', 'placeholder' => 'Code'] ) !!}
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Product Name</span>
                </div>
              {!! Form::text('name', ( isset($item->name) ? $item->name : '' ), ['class'=>'form-control', 'placeholder' => 'Name'] ) !!}
            </div>
            <div class="custom-control custom-switch mb-3">
              <input class="custom-control-input" type="checkbox" name="special" id="special" {{ ( isset($item->special) ? (($item->special == 1) ? ' checked' : '') : '') }} />
              <label class="custom-control-label" for="special"> Special (Hide from Listing)</label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Description</span>
                </div>
              {!! Form::textarea('description', ( isset($item->description) ? $item->description : '' ), ['class'=>'form-control', 'rows' => '2'] ) !!}
            </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Email Notifications</span>
                </div>
              {!! Form::text('emailnotifications', ( isset($item->emailnotifications) ? $item->emailnotifications : '' ), ['class'=>'form-control', 'placeholder' => 'emails separated by ,'] ) !!}
            </div>
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            <a href="/{{ (isset($mod) ? $mod : '') }}{{ ( isset($item->code) ? '/' . $item->code . '/view' : ( isset($productcode) ? '/' . $productcode . '/view' : '' ) ) }}{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
        </div>
        {{-- End Edit and Add Form --}}
        <div class="col-1">
        </div>  
        <div class="col-4">
          @include($mod . '.modifyrighta')
        <div></div>
          @include($mod . '.modifyrightb')
        </div>
      </div>
    </form>
  {{-- End Edit and Add Form --}}
  </div>  