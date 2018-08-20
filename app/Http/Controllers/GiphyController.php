<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GiphyService;

class GiphyController extends Controller
{
    public function index(GiphyService $service, $term)
    {
        $data = $service->search($term);
        return response($data)->header('Content-Type', 'application/json');
    }
}
