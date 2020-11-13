<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrailerController extends Controller
{
    public function getAllTrailers()
    {
        $trailers = DB::table('trailers')->get();
        return response(['trailers' => $trailers]);
    }
}
