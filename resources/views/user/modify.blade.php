  <div class="col-12">
  {{-- Begin Edit and Add Form --}}
    <form action="" method="post">
      <div class="row">
        <div class="col-7">
            {!! Form::token() !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Username</span>
                </div>
                {!! Form::text('username', ( isset($item->username) ? $item->username : '' ), ['class'=>'form-control', 'placeholder' => 'Username'] ) !!}
              </div>
              @if($verb === 'add')
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Password</span>
                </div>
                  {!! Form::password('password', ['class'=>'form-control', 'placeholder' => 'Password']) !!}
                </div>
              @endif
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Name</span>
                </div>
                {!! Form::text('name', ( isset($item->name) ? $item->name : '' ), ['class'=>'form-control', 'placeholder' => 'Name'] ) !!}
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Email</span>
                </div>
                {!! Form::text('email', ( isset($item->email) ? $item->email : '' ), ['class'=>'form-control', 'placeholder' => 'Email'] ) !!}
              </div>
              <div class="input-group ui-widget mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Institution</span>
                </div>
                {!! Form::text('institutionname', ( isset($item->institution) ? $item->institution->name : '' ), ['class'=>'form-control searchlist', 'placeholder' => 'Institution', 'id' => 'institution'] ) !!}
                {!! Form::hidden('institutionid', ( isset($item->institutionid) ? $item->institutionid : '' ), ['id' => 'institutionid']) !!}
              </div>
              {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
              <a href="/{{ (isset($mod) ? $mod : '') }}{{ ( isset($username) ? '/' . $username . '/view' : (isset($item->username) ? '/' . $item->username . '/view' : '' ) ) }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
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