<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
  /**
   * A basic functional test example.
   *
   * @return void
   */
  public function testLoginSuccess()
  {
    $user = factory(App\User::class)->create(['password' => bcrypt('senha1')]);

    $this->visit('/')->see('Gestão de Produtos')
      ->click('Login')
      ->type($user->email, 'email')
      ->type('senha1', 'password')
      ->press('Login')
      ->see('Dashboard')
      ->see('You are logged in!');
  }

  public function testLoginInvalid()
  {
    $this->visit('/')->see('Gestão de Produtos')
      ->click('Login')
      ->type('email@qualquer.com', 'email')
      ->type('senha1', 'password')
      ->press('Login')
      ->see('These credentials do not match our records');
  }
}
