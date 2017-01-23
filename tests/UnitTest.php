<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UnitTest extends TestCase // Some unit testing with the Login and Register feature
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

    public function testUserRegistration() // user registration testing (unused, only run once)
    {                                      // test adding user to database
      $this->visit('/register') // test adding new users to the database with all expected paths
      ->type('test1994', 'name')
      ->type('test1994@hotmail.com','email')
      ->type('test1994','password')
      ->type('test1994','password_confirmation')
      ->press('Register')
      ->seePageIs('home');
    }
}
