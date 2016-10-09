<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Import;
use App\Product;

use Excel;

class ProcessImport implements ShouldQueue
{
  use Queueable;

  protected $import;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(Import $import)
  {
    $this->import = $import;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    $import = $this->import;

    $import->status = Import::STATUS_PROCESSING;
    $import->save();

    Excel::load('storage/app/' . $import->filename, function($reader) use ($import) {
      $reader->noHeading();
      $reader->ignoreEmpty();

      $rows = $reader->get()->first()->all();

      $category = '';

      for ($i=1; $i < count($rows); $i++) {
        $row = $rows[$i]->all();

        if (!empty($row) && $row[1] == 'category') $category = $row[2];

        if (!empty($row) && $row[1] != 'lm' && $row[1] != 'category' ){
          $product = Product::where('lm', '=', $row[1])->where('user_id', '=', $import->user_id)->first();

          if (!$product) $product = new Product();

          $product->category = $category;
          $product->lm = $row[1];
          $product->name = $row[2];
          $product->free_shipping = $row[3];
          $product->description = $row[4];
          $product->price = $row[5];
          $product->import_id = $import->id;
          $product->user_id = $import->user_id;

          $product->save();
        }
      }
    });

    $import->status = Import::STATUS_DONE;
    $import->save();
  }
}
