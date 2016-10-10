<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
  static $password;

  return [
  'name' => $faker->name,
  'email' => $faker->unique()->safeEmail,
  'password' => $password ?: $password = bcrypt('secret'),
  'remember_token' => str_random(10),
  ];
});

$factory->define(App\Import::class, function (Faker\Generator $faker) {
  return [
  'user_id' => factory(App\User::class)->create()->id,
  'filename' => $faker->name,
  'status' => $faker->numberBetween(App\Import::STATUS_QUEUED, App\Import::STATUS_DONE),
  ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker){
  static $user_id;

  return [
  'user_id' => $user_id ?: factory(App\User::class)->create()->id,
  'import_id' => factory(App\Import::class)->create()->id,
  'lm' => $faker->numberBetween(),
  'name' => 'Furadeira',
  'price' => 100.98,
  'category' => 'Ferramentas',
  'free_shipping' => $faker->boolean,
  'description' => 'Furadeira nova'
  ];
});
