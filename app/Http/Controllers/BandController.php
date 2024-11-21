<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Band;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bands = Band::class
            ->join('albums', 'bands.album_id', '=', 'albums.id')
            ->groupBy('bands.album_id')
            ->select('bands.*', "count(albums.id) as 'Total Albums'");

        return view('bands.all', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists = Artist::all();
        $albums = Album::all();

        view('bands.create', compact('albums', 'artists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Band::class->validationRules);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = Storage::putFile('uploadedImages', $request->photo);
        }

        Band::class->insert([
                'name' => $request->name,
                'slug' => Str::kebab($request->name),
                'description' => $request->description,
                'genres' => $request->genres,
                'photo' => $photo,
                'artist_id' => $request->artist_id,
                'album_id'=> $request->album_id
            ]);

        return redirect()->route('bands.all')->with('message', 'New band added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $band = DB::table('bands')->where('slug' , $id)->first();
        $albums = DB::table('albums')->where('id', $band->album_id)->get();

        return view('details', compact('band', 'albums'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editBands = Band::class
            ->where('id' , $id)
            ->first();

        return view('bands.edit', compact('editBands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = Storage::putFile('uploadedImages', $request->photo);
        }

        Band::class
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'slug' => Str::kebab($request->name),
                'description' => $request->description,
                'genres' => $request->genres,
                'photo' => $photo,
                'artist_id' => $request->artist_id,
                'album_id'=> $request->album_id
            ]);

        return redirect()->route('bands.all')->with('message', 'Band updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Band::class
            ::where('id', $id)
            ->delete();

        return back()->with('message', 'Band deleted successfully!');
    }
}
