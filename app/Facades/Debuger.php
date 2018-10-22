<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Debuger extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'debuger';
  }
}