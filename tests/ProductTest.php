<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
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
    $product = factory(App\Product::class)->create(['user_id' => $this->user->id, 'free_shipping' => false]);

    $this->visit('/home')
      ->click('Products')
      ->see('Furadeira')
      ->see(100.98)
      ->see('Ferramentas')
      ->see('No')
      ->click('Edit')
      ->type('Madeira', 'name')
      ->type(190.98, 'price')
      ->type('Material de construção', 'category')
      ->type('Madeira própria para construção de casas', 'description')
      ->check('free_shipping')
      ->press('Save')
      ->see('Madeira')
      ->see(190.98)
      ->see('Material de construção')
      ->see('Yes')
      ->see('Product updated successfully')
      ->press('Delete')
      ->see('Product deleted');

    $this->assertNull($product->fresh());
  }
}
