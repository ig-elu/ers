  <div class="col-12">
  {{-- Begin Edit and Add Form --}}
    <form action="" method="post">
      <div class="row">
        <div class="col-7">
          {!! Form::token() !!}
          <div class="form-group">
            {!! Form::hidden('id', ( isset($item->id) ? $item->id : '' )) !!}
          </div>
          <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', ( isset($item->name) ? $item->name : '' ), ['class'=>'form-control', 'placeholder' => 'Name'] ) !!}
          </div>
          <div class="form-group">
            {!! Form::label('votemultiplier', 'Vote Multiplier') !!}
            {!! Form::text('votemultiplier', ( isset($item->votemultiplier) ? $item->votemultiplier : '' ), ['class'=>'form-control'] ) !!}
          </div>
          <div class="form-group ui-widget">
            {!! Form::label('countryname',  'Country') !!}
            {!! Form::text('countryname', ( isset($item->countryname->name) ? $item->countryname->name : '' ), ['class'=>'form-control searchlist', 'placeholder' => 'Country', 'id' => 'countries'] ) !!}
            {!! Form::hidden('country', ( isset($item->country) ? $item->country : '' ), ['id' => 'countriesid']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('countryphonecode', 'Country Phone Code') !!}
            {!! Form::text('countryphonecode', ( isset($item->countryphonecode) ? $item->countryphonecode : '' ), ['class'=>'form-control', 'placeholder' => '', 'id' => "countryphonecode"] ) !!}
          </div>
          <div class="form-group">
            {!! Form::label('consortia', 'Consortia') !!}
            {!! Form::text('consortia', ( isset($item->consortia) ? $item->consortia : '' ), ['class'=>'form-control', 'placeholder' => ''] ) !!}
          </div>
          @include('institution.modifybottom')
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