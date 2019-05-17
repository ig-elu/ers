  <div class="col-12">
  {{-- Begin Edit and Add Form --}}
    <form action="" method="post">
      <div class="row">
        <div class="col-7">
          {!! Form::token() !!}
          <div class="form-group">
            {!! Form::hidden('id', ( isset($item->id) ? $item->id : '' )) !!}
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Name</span>
              </div>
            {!! Form::text('name', ( isset($item->name) ? $item->name : '' ), ['class'=>'form-control', 'placeholder' => 'Name'] ) !!}
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Vote Multiplier</span>
              </div>
            {!! Form::text('votemultiplier', ( isset($item->votemultiplier) ? $item->votemultiplier : '' ), ['class'=>'form-control'] ) !!}
          </div>
          <div class="input-group mb-3 ui-widget">
              <div class="input-group-prepend">
                <span class="input-group-text">Country</span>
              </div>
            {!! Form::text('countryname', ( isset($item->countryname->name) ? $item->countryname->name : '' ), ['class'=>'form-control searchlist', 'placeholder' => 'Country', 'id' => 'countries'] ) !!}
            {!! Form::hidden('country', ( isset($item->country) ? $item->country : '' ), ['id' => 'countriesid']) !!}
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">National Phone Code</span>
              </div>
            {!! Form::text('countryphonecode', ( isset($item->countryphonecode) ? $item->countryphonecode : '' ), ['class'=>'form-control', 'placeholder' => '', 'id' => "countryphonecode"] ) !!}
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Consortia</span>
              </div>
            {!! Form::text('consortia', ( isset($item->consortia) ? $item->consortia : '' ), ['class'=>'form-control', 'placeholder' => ''] ) !!}
          </div>
          @include('institution.modifybottom')
          <div class="md-3"></div>
          {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
          <a href="/{{ (isset($mod) ? $mod : '') }}{{ ( isset($item->id) ? '/' . $item->id . '/view' : ( isset($institutionid) ? '/' . $institutionid . '/view' : '' ) ) }}{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
        </div>
        <div class="col-1">
        </div>  
        <div class="col-4">
          @include('institution.modifyrighta')
        </div>
      </div>
    </form>
  {{-- End Edit and Add Form --}}
  </div>  