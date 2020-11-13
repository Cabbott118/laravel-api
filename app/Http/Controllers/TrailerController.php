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

    public function addTrailer(Request $request)
    {
        DB::table('trailers')->insert([
            'trailer_brand' => $request->trailer_brand,
            'trailer_type' => $request->trailer_type
        ]);
        return response(['message' => 'Trailer successfully added!']);
    }

    public function getTrailerById($id)
    {
        $trailer = DB::table('trailers')->where('id', $id)->first();
        return response(['trailer' => $trailer]);
    }

    public function deleteTrailer($id)
    {
        DB::table('trailers')->where('id', $id)->delete();
        return response(['message' => 'Trailer successfully removed!']);
    }

    public function editTrailer(Request $request)
    {
        DB::table('trailers')->where('id', $request->id)->update([
            'trailer_brand' => $request->trailer_brand,
            'trailer_type' => $request->trailer_type
        ]);
        return response(['message' => 'Trailer updated successfully!']);
    }
}
