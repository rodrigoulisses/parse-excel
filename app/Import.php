<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
  const STATUS_QUEUED = 0;
  const STATUS_PROCESSING = 1;
  const STATUS_DONE = 2;

  private static $statusNames = ['queued', 'processing', 'done'];

  public function statusName()
  {
    return self::$statusNames[$this->status];
  }

  public function products()
  {
    return $this->hasMany('App\Product');
  }

  public function totalProducts()
  {
    return $this->products->count();
  }
}
