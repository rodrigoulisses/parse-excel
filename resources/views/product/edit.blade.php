@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          Product
          <a href="{{ url('/products') }}" class='right'>Cancel</a>
        </div>

        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('products.update', ['id' => $product->id]) }}">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}

            <div class="form-group">
              <div class="col-md-12">
                <label for="lm">lm</label>
                <input type='text' name='lm' class='form-control' value='{{ $product->lm }}' required />
                @if ($errors->has('lm'))
                  <span class="help-block">
                    <strong>{{ $errors->first('lm') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <label for="name">Name</label>
                <input type='text' name='name' class='form-control' value='{{ $product->name }}' required />
                @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <label for="category">Category</label>
                <input type='text' name='category' class='form-control' value='{{ $product->category }}' required />
                @if ($errors->has('category'))
                  <span class="help-block">
                    <strong>{{ $errors->first('category') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <label for="free_shipping">Free shipping</label>
                <input type='checkbox' name='free_shipping' class='form-control' {{ $product->free_shipping ? 'checked' : '' }} required />
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <label for="price">Price</label>
                <input type='text' name='price' class='form-control' value='{{ $product->price }}' step=".01" required />
                @if ($errors->has('price'))
                  <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <label for="description">Description</label>
                <textarea name="description" id="" cols="30" rows="5" class='form-control'>{{ $product->description }}</textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <input type='submit' value='Save' class='btn btn-primary' />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
