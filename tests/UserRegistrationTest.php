<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRegistrationTest extends TestCase
{
  public function testRegistrationSuccess()
  {
    $this->visit('/')
      ->click('Register')
      ->type('Raimundo Francisco', 'name')
      ->type('raimundo@email.com', 'email')
      ->type('chico12', 'password')
      ->type('chico12', 'password_confirmation')
      ->press('Register')
      ->see('You are logged in!');
  }
}
?>
