<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtistResource;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    /**
     * Constructor to set middleware
     */
    public function __construct()
    {
        // Apply auth middleware only to create, edit, update, and delete methods
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $artists = Artist::all();

        return view('artist.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('details', ['type' => 'artist', 'openDrawer' => true]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'genres' => 'nullable|string'
        ]);

        $artist = Artist::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
            'slug' => Str::slug($validatedData['name']),
            'genres' => $validatedData['genres'] ?? null
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('artistsImages', 'public');
            $artist->image = $path;
            $artist->save();
        }

        return response()->json([
            'message' => 'Artist created successfully',
            'redirect' => route('artist.show', $artist->slug)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $artist = Artist::with('albums')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('details', [
            'type' => 'artist',
            'item' => new ArtistResource($artist)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        // Delete the artist's image if it exists
        if ($artist->image) {
            Storage::disk('public')->delete($artist->image);
        }

        $artist->delete();

        return redirect()->route('home')->with('message', 'Artist deleted successfully');
    }
}
