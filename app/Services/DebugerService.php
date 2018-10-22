<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App;
class DebugerService 
{
  public function logQueryDataAsJSON()
  {
    if(App::environment('local')) {
      return json_encode(DB::getQueryLog());
    }
    return "";
  }
}