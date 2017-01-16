<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
  protected $table = 'pictures';
  protected $fillable = ['filename','picture']; // database validated that requires certain fields to be filled it
                                                // protect from empty fields
}
