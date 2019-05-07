@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row justify-content-left">
        <div class="col-1">
        </div>  
        <div class="col-11">
        <h3>{{ (isset($mod) ? $mod : '') }}</h3>
        </div>
    </div>
    <div class="row justify-content-left">

        <div class="col-1">
        </div>  
        <div class="col-md-6">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        @if (\Session::has('success'))
             <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
             </div><br />
        @endif
        @if (isset($success))
             <div class="alert alert-success">
                <p>{{ $success }}</p>
             </div><br />
        @endif
        

        @if(isset($verb) && ($verb == 'add' || $verb == 'edit'))

            <form action="" method="post">
            {!! Form::token() !!}
 
              <div class="form-group">
                {!! Form::label('username', 'Username') !!}
                {!! Form::text('username', ( isset($item->username) ? $item->username : '' ), ['class'=>'form-control', 'placeholder' => 'Username'] ) !!}
              </div>
              <div class="form-group">
                {!! Form::label('name',  'Name') !!}
                {!! Form::text('name', ( isset($item->name) ? $item->name : '' ), ['class'=>'form-control', 'placeholder' => 'Name'] ) !!}
              </div>
              <div class="form-group">
                {!! Form::label('email',  'Email') !!}
                {!! Form::text('email', ( isset($item->email) ? $item->email : '' ), ['class'=>'form-control', 'placeholder' => 'Email'] ) !!}
              </div>
              @if($verb === 'add')
                <div class="form-group">
                  {!! Form::label('password', 'Password') !!}
                  {!! Form::password('password', ['class'=>'form-control', 'placeholder' => 'Password']) !!}
                </div>
              @endif
              {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
              <a href="/user{{ ( isset($username) ? '/' . $username . '/view' : (isset($item->username) ? '/' . $item->username . '/view' : '' ) ) }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
            </form>

        @elseif (isset($list))
            <a href="/user/add" class="btn btn-success">Add</a><br /><br />

            <ul class="list-group">
            @foreach ($list as $item)
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-5">
                        <a href="/user/{{ ( isset($item->username) ? $item->username : '' ) }}/view">{{ ( isset($item->username) ? $item->username : '' ) }}</a>
                    </div>
                    <div>
                       {{ ( isset($item->name) ? $item->name : '' ) }} 
                    </div>
                  </div>
                </li>
            @endforeach
            </ul>

        @elseif (isset($item))

            <div class="card w-75">
              <div class="card-body">
                <h4 class="card-title">User: {{ ( isset($item->name) ? $item->name : '' ) }}</h4>
                <h6 class="card-subtitle mb-2 text-muted">Username: {{ ( isset($item->username) ? $item->username : '' ) }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Email: {{ ( isset($item->email) ? $item->email : '' ) }}</h6>
                <a href="edit" class="btn btn-primary">Edit</a>
                <a href="delete" class="btn btn-danger">Delete</a>
                <a href="/user/" class="btn btn-outline-secondary">Cancel</a>

              </div>
            </div>

        @endif
        </div>
    </div>
</div>
@endsection
