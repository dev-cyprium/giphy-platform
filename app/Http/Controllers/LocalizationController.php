<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App;
class LocalizationController extends Controller
{
    public function change($locale) 
    {
        Session::put('locale', $locale);
        return Redirect::back();
    }

    public function get() 
    {
        return ['locale' => App::getLocale()];
    }
}
