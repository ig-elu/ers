      {{-- Begin Edit and Add Form --}}
      <div class="col-8">
            <form action="" method="post">
            {!! Form::token() !!}
              <div class="form-group">
                {!! Form::label('username', 'Username') !!}
                {!! Form::text('username', ( isset($item->username) ? $item->username : '' ), ['class'=>'form-control', 'placeholder' => 'Username'] ) !!}
              </div>
              @if($verb === 'add')
                <div class="form-group">
                  {!! Form::label('password', 'Password') !!}
                  {!! Form::password('password', ['class'=>'form-control', 'placeholder' => 'Password']) !!}
                </div>
              @endif
              <div class="form-group">
                {!! Form::label('name',  'Name') !!}
                {!! Form::text('name', ( isset($item->name) ? $item->name : '' ), ['class'=>'form-control', 'placeholder' => 'Name'] ) !!}
              </div>
              <div class="form-group required">
                {!! Form::label('email',  'Email', ['class' => 'control-label']) !!}
                {!! Form::text('email', ( isset($item->email) ? $item->email : '' ), ['class'=>'form-control', 'placeholder' => 'Email'] ) !!}
              </div>
              <div class="form-group ui-widget">
                {!! Form::label('institutionname',  'Institution') !!}
                {!! Form::text('institutionname', ( isset($item->institution) ? $item->institution->name : '' ), ['class'=>'form-control searchlist', 'placeholder' => 'Institution', 'id' => 'institution'] ) !!}
                {!! Form::hidden('institutionid', ( isset($item->institutionid) ? $item->institutionid : '' ), ['id' => 'institutionid']) !!}
              </div>
              {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
              <a href="/{{ (isset($mod) ? $mod : '') }}{{ ( isset($username) ? '/' . $username . '/view' : (isset($item->username) ? '/' . $item->username . '/view' : '' ) ) }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
          </form>
      </div>
      {{-- End Edit and Add Form --}}
      <div class="col-1">
      </div>  
      <div class="col-3">
       @include($mod . '.modifyrighta')
      <div></div>
       @include($mod . '.modifyrightb')
      </div>