<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Import;
use App\Product;

use App\Jobs\ProcessImport;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ImportController extends DashboardController
{

  public function index(Request $request)
  {
    $imports = $request->user()->imports()->get();

    return view('import.index', ['imports' => $imports]);
  }

  public function create(){
    return view('import.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'file' => 'max:20000|mimes:xls,xlsx|required'
    ]);

    $file = $request->file('file')->store('imports/' . time());


    $import = new Import();
    $import->user_id = $request->user()->id;
    $import->filename = $file;
    $import->status = Import::STATUS_QUEUED;
    $import->save();

    $this->dispatch(new ProcessImport($import));

    return redirect()->route('products.index')->with('message', 'Import scheduled');
  }
}
?>
