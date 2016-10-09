<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ImportTest extends TestCase
{

  protected $user;

  public function setUp()
  {
      parent::setUp();
      $this->user = factory(App\User::class)->create();
      $this->actingAs($this->user);
  }

  public function testImportSuccess()
  {
    $file = public_path() . '/../tests/fixtures/products_teste_webdev_leroy.xlsx';

    $this->visit('/home')
      ->click('Imports')
      ->click('Import Products')
      ->attach($file, 'file')
      ->press('Import')
      ->see('Import scheduled')
      ->see('Products')
      ->see('Furadeira X')
      ->see('Furadeira Y')
      ->see('Chave de Fenda X')
      ->click('Imports')
      ->see('done')
      ->see('6');
  }
}
