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
              <h5><span class="label-default">Module for "{{ ( isset($item_a->name) ? $item_a->name : '' ) }}"</span></h5>
              <div class="form-group">
                {!! Form::hidden('productcode', ( isset($item->productcode) ? $item->productcode : '' ) ) !!}
              </div>
              <div class="form-group">
                {!! Form::label('code', 'Module Code') !!}
                {!! Form::text('code', ( isset($item->code) ? $item->code : '' ), ['class'=>'form-control', 'placeholder' => 'Code'] ) !!}
              </div>
              <div class="form-group">
                {!! Form::label('name', 'Module Name') !!}
                {!! Form::text('name', ( isset($item->name) ? $item->name : '' ), ['class'=>'form-control', 'placeholder' => 'Name'] ) !!}
              </div>
              <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', ( isset($item->description) ? $item->description : '' ), ['class'=>'form-control', 'rows' => '3'] ) !!}
              </div>
              {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
              <a href="/product/{{ ( isset($item->productcode) ? $item->productcode : ( isset($productcode) ? $productcode : '' )) }}{{  ( isset($item->code) ? '/module/' . $item->code : ( isset($modulecode) ? '/module/' . $modulecode : '' )) }}/view" class="btn btn-outline-secondary">Cancel</a>
            </div>
            </form>

        @elseif (isset($list))
            <a href="module/add" class="btn btn-success">Add</a><br /><br />

            <ul class="list-group">
            @foreach ($list as $item)
                <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-6">
                      <span>
                        <a href="/product/{{ ( isset($item->code) ? $item->code : '' ) }}/view">{{ ( isset($item->name) ? $item->name : '' ) }}</a>
                      </span>
                    </div>
                    <div>
                      <span class="badge badge-primary"  data-toggle="collapse" data-target="#{{ $item->code }}" aria-expanded="false" aria-controls="collapseExample">
                        See description
                      </span>
                    </div>
                    </div>
                    <div class="collapse" id="{{ $item->code }}">
                      <div class="card card-body">
                        {{ ( isset($item->description) ? $item->description : '' ) }}
                      </div>
                    </div>
                </li>
            @endforeach
            </ul>

        @elseif (isset($item))

            <div class="card w-75">
              <div class="card-body">
                <h4 class="card-title">Module: {{ ( isset($item->name) ? $item->name : '' ) }} for "{{ ( isset($item_a->name) ? $item_a->name : '' ) }}"</h4>
                <h6 class="card-subtitle mb-2 text-muted">Code: {{ ( isset($item->code) ? $item->code : '' ) }}</h6>
                <p class="card-text">{{ ( isset($item->description) ? $item->description : '' ) }}</p>
                <p class="card-text">{{ ( isset($item->emailnotifications) ? $item->emailnotifications : '' ) }}</p>
                <a href="edit" class="btn btn-primary">Edit</a>
                <a href="delete" class="btn btn-danger">Delete</a>
                <a href="/product/{{ ( isset($item->productcode) ? $item->productcode : ( isset($productcode) ? $productcode : '' ) ) }}/view" class="btn btn-outline-secondary">Cancel</a>

              </div>
            </div>

        @endif
        </div>
    </div>
</div>
@endsection
