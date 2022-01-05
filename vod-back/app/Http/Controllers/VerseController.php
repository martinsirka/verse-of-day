<?php

namespace App\Http\Controllers;

use App\Models\Verse;
use Illuminate\Http\Request;

class VerseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Verse::withCount(['favoritedByUsers'])->get()
        );
    }
}

//  Verse::withCount(['favoritedByUsers'])->get();  Aby mi vratilo kelko raz je vers like-ovani.
