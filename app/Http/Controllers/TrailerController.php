<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Trailers;

class TrailerController extends Controller
{
    public function getAllTrailers()
    {
        $trailers = DB::table('trailers')->get();
        return response(['trailers' => $trailers]);
    }

    public function getTrailerById($id)
    {
        $trailer = DB::table('trailers')->where('id', $id)->first();
        return response(['trailer' => $trailer]);
    }

    public function addTrailer(Request $request)
    {
        DB::table('trailers')->insert([
            'trailer_brand' => $request->trailer_brand,
            'trailer_type' => $request->trailer_type
        ]);
        return response(['message' => 'Trailer successfully added!']);
    }

    public function editTrailer(Request $request)
    {
        //  FRONT END: send back entire object of previously
        //             stored data
        DB::table('trailers')->where('id', $request->id)->update([
            'trailer_brand' => $request->trailer_brand,
            'trailer_type' => $request->trailer_type
        ]);
        return response(['message' => 'Trailer updated successfully!']);
    }
    
    public function deleteTrailer($id)
    {
        DB::table('trailers')->where('id', $id)->delete();
        return response(['message' => 'Trailer successfully removed!']);
    }
}
