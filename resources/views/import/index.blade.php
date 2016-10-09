@extends('layouts.app')

@section('title', 'Imports')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          All imports
          <a href="{{ url('/imports/create') }}" class='right'>Import Products</a>
        </div>

        <div class="panel-body">
          <table class='table table-striped'>
            <thead>
              <th>File name</th>
              <th>Total products</th>
              <th>Status</th>
              <th>Created at</th>
              <th>Actions</th>
            </thead>

            <tbody>
              @foreach ($imports as $import)
                <tr>
                  <td>{{ $import->filename }}</td>
                  <td>{{ $import->totalProducts() }}</td>
                  <td>{{ $import->statusName() }}</td>
                  <td>{{ $import->created_at }}</td>
                  <td></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
