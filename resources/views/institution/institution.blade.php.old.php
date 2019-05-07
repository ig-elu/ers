@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-left">
    <div class="col-md-2">
        <h3>{{ (isset($mod) ? ucfirst($mod) : '') }}s</h3>
    </div>
    {{-- Begin System Feedback --}}
    <div class="col-md-8">
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
    </div>
    {{-- End System Feedback --}}
    <div class="col-md-2">
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row justify-content-left">
    <div id="left-column" class="col-md-2">
    </div>  
    <div id="main-column" class="col-md-8 row">
    @if (isset($list))
      {{-- Begin Search and List Form --}}
      <div class="col-12">
        {!! Form::token() !!}
        <form action="" method="get">
        <div class="w-75">
          <div class="form-group">
            <div class="input-group has-feedback has-clear">
              <input type="text" class="form-control" name="query" placeholder="Enter your search term ..." value="{{ ( isset($query) ? $query : '' ) }}">
              <div class="input-group-append">
                <a class="btn btn-custom" href="/{{ (isset($mod) ? $mod : '') }}" title="clear"><i class="fas fa-times"></i></a>
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
           </div> 
        </div>
        </form>
        <div class="float-right"><a href="{{ (isset($mod) ? $mod : '') }}/add"><button type="button" class="btn btn-success">Create {{ (isset($mod) ? ucfirst($mod) : '') }}</button></a></div>
        <div class="font-weight-bold pb-3">
          {{(($query !== "") ? 'Your query "' . $query . '" has ' : '') }}
          {{(($list->total() !== null) ? $list->total() .' results.' : '') }}
        </div>
        <div class="d-flex justify-content-center">
          {{(($list->links() !== null) ? $list->links() : '') }}
        </div>
        <div>
          <ul class="list-group">
          @foreach ($list as $item)
            <li class="list-group-item">
              <div class="row ml-1">
                <div class="col-7">
                  <a href="/{{ (isset($mod) ? $mod : '') }}/{{ ( isset($item->id) ? $item->id : '' ) }}/view{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}">{{ ( isset($item->name) ? $item->name : '' ) }}</a>
                </div>
                <div>
                  @if( isset($item->iug))
                    @foreach ($item->iug as $item_a)
                      <div>{{ $item_a->name }}</div>
                    @endforeach
                  @endif
                </div>
              </div>
            </li>
          @endforeach
          </ul>
        </div>
        <div class="d-flex justify-content-center pt-3">
          {{ (($list->links() !== null) ? $list->links() : '') }}
        </div>
      </div> 
      {{-- End Search and List Form --}}
    @elseif(isset($verb) && ($verb == 'add' || $verb == 'edit'))
      {{-- Begin Edit and Add Form --}}
      <div class="col-7">
        <form action="" method="post">
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
          <div class="form-group">
            {!! Form::label('country', 'Country') !!}
            {!! Form::text('country', ( isset($item->country) ? $item->country : '' ), ['class'=>'form-control', 'placeholder' => ''] ) !!}
          </div>
          <div class="form-group">
            {!! Form::label('countryphonecode', 'Country Phone Code') !!}
            {!! Form::text('countryphonecode', ( isset($item->countryphonecode) ? $item->countryphonecode : '' ), ['class'=>'form-control', 'placeholder' => ''] ) !!}
          </div>
          <div class="form-group">
            {!! Form::label('consortia', 'Consortia') !!}
            {!! Form::text('consortia', ( isset($item->consortia) ? $item->consortia : '' ), ['class'=>'form-control', 'placeholder' => ''] ) !!}
          </div>
          {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
          <a href="/{{ (isset($mod) ? $mod : '') }}{{ ( isset($item->id) ? '/' . $item->id . '/view' : ( isset($institutionid) ? '/' . $institutionid . '/view' : '' ) ) }}{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
        </form>
      </div>
      {{-- End Edit and Add Form --}}
    @elseif (isset($item))
      {{-- Begin View Form --}}
      <div class="col-7">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Institution: {{ ( isset($item->name) ? $item->name : '' ) }}</h4>
            <h6 class="card-subtitle mb-2 text-muted">Id: {{ ( isset($item->id) ? $item->id : '' ) }}</h6>
            <p class="card-text">Country: {{ ( isset($item->country) ? $item->country : '' ) }}</p>
            <p class="card-text">Phone Code: {{ ( isset($item->countryphonecode) ? $item->countryphonecode : '' ) }}</p>
            <a href="edit{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-primary">Edit</button></a>
            <a href="delete{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}" id="delete"><button type="button" class="btn btn-danger" >Delete</button></a>
            <a href="/{{ (isset($mod) ? $mod : '') }}/{{ ( isset($query) ? (($query !== '') ? '?query=' . $query : '?') : '?' ) }}{{ ( isset($page) ? (($page !== '') ? '&page=' . $page : '') : '' ) }}"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
          </div>
        </div>
      </div>
      <div class="col-1">
      </div>  
      <div class="col-4">
      @if (isset($list_a))
      {{-- Begin View Right Column A --}}
        <div>
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">Products</h5>
              </div>
              <ul class="list-group list-group-flush">
           @foreach ($list_a as $item_a)
                <li class="list-group-item">{{ isset($item_a->product->name) ? $item_a->product->name : '' }}</li>
            @endforeach
              </ul>
          </div>
        </div>
        {{-- End View Right Column A --}}
      @endif
      @if (isset($list_b))
        {{-- Begin View Right Column B --}}
        <div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User Groups</h5>
            </div>
            <ul class="list-group list-group-flush">
            @foreach ($list_b as $item_b)
              <li class="list-group-item">{{ isset($item_b->usergroup->name) ? $item_b->usergroup->name : '' }}</li>
            @endforeach
            </ul>
          </div>
        </div>
        {{-- End View Right Column B --}}
      @endif
      </div>
      {{-- End View Form --}}
    @endif
    </div>
    <div id="right-column" class="col-md-2">
    </div>
  </div>
</div>
@endsection
