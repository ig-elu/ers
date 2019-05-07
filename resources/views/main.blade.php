@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-left">
    <div class="col-md-2">
        <h3>{{ (isset($mod) ? ucfirst($mod) : '') }}s</h3>
    </div>
    <div class="col-md-5">
      @include('components.systemfeedback')
    </div>
    <div class="col-md-5">
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row justify-content-left">
    <div id="left-column" class="col-md-1">
    </div>  
    <div id="main-column" class="col-md-10 row">
      @if (isset($list))
        @include($mod . '.list')
      @elseif(isset($verb) && ($verb == 'add' || $verb == 'edit'))
        @include($mod . '.modify')
      @elseif (isset($item))
        @include($mod . '.view')
    @endif
    </div>
    <div id="right-column" class="col-md-1">
    </div>
  </div>
</div>
@endsection
