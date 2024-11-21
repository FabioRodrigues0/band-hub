<?php

namespace App\Http\Controllers;


use App\Models\Album;
use App\Models\Artist;
use App\Models\Band;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $artists = DB::table('artists')->get()->take(4);
        $bands = DB::table('bands')->get()->take(4);
        $albums = DB::table('albums')->get()->take(9);

        return view('home', compact('artists','albums', 'bands'));
    }

    /**
     * Display a listing of the resource.
     */
    public function list($table)
    {
        //
        $list = DB::table($table)->get();

        return view('list', compact('list', 'list'));
    }

}
