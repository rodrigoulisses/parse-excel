@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          All products
          <a href="{{ url('/imports/create') }}" class='right'>Import Products</a>
        </div>

        <div class="panel-body">
          <table class='table table-striped'>
            <thead>
              <th>lm</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Free Shipping</th>
              <th>Actions</th>
            </thead>

            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>{{ $product->lm }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->free_shipping ? 'Yes' : 'No' }}</td>
                <td>
                  <a href="{{ route('products.edit', ['id' => $product->id]) }}" class='btn btn-sm btn-primary'>Edit</a>
                  <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value='Delete' class='btn btn-sm btn-danger'>
                  </form>
                </td>
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
