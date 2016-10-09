@extends('layouts.app')

@section('title', 'Import Products')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          Import products
          <a href="{{ url('/products') }}" class='right'>Cancel</a>
        </div>

        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/imports') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <div class="col-md-12">
                <input type='file' name='file' class='form-control' accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                @if ($errors->has('file'))
                  <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <input type='submit' value='Import' class='btn btn-primary' />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
