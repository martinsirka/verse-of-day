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
        $verses = Verse::latest()->take(4)->get();
        return response()->json(['verses' => $verses]);
    }
}

//  Verse::withCount(['favoritedByUsers'])->get();  Aby mi vratilo kelko raz je vers like-ovani.
