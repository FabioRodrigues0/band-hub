<?php

namespace App\Http\Controllers;


use App\Models\Album;
use App\Models\Artist;
use App\Models\Band;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $artists = Artist::all()->take(4);
        $bands = Band::all()->take(4);
        $albums = Album::all()->take(9);

        return view('home', compact('artists', 'albums', 'bands'));
    }

}
