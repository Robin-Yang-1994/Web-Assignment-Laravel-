<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testUserLogin() // User login testing
    {
      $this->visit('/login') // testing the login to the database with all expected paths
      ->type('robin@hotmail.com','email')
      ->type('robinyang1994','password')
      ->press('Login')
      ->seePageIs('home');
    }

    public function testUserRegistration() // User registration testing (unused, only run once)
    {
      $this->visit('/register') // testing adding new users to the database with all expected paths
      ->type('test1234', 'name')
      ->type('test1234@hotmail.com','email')
      ->type('test1234','password')
      ->type('test1234','password_confirmation')
      ->press('Register')
      ->seePageIs('home');
    }
}
