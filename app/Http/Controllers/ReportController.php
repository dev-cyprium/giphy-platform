<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        Report::create(array_merge($request->all(), ["user_id" => $user_id]));
    }
}
