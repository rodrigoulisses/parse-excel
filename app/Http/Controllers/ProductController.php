<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductController extends DashboardController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $products = $request->user()->products()->get();

    return view('product.index', ['products' => $products]);
  }

  public function edit($id)
  {
    $product = Product::find($id);

    return view('product.edit', ['product' => $product]);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'price' => 'numeric|required',
      'lm' => 'required',
      'description' => 'required',
      'category' => 'required'
    ]);

    $product = Product::find($id);

    $fields = ['lm', 'name', 'category', 'free_shipping', 'description', 'price'];
    foreach ($fields as $field) {
      $product->$field = $request->input($field);
    }

    $product->save();

    return redirect()->route('products.index')->with('message', 'Product updated successfully');;

  }

  public function destroy($id)
  {
    $product = Product::find($id);

    if ($product){
      $product->delete();
      $message = 'Product deleted';
    }else{
      $message = 'Product not found';
    }

    return redirect()->route('products.index')->with('message', $message);
  }
}
