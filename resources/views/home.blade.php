@extends('layouts.app')

@section('menu')
  <li><a href="{{ url('/products') }}">Products</a></li>
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Dashboard</div>

          <div class="panel-body">
            You are logged in!<br>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
