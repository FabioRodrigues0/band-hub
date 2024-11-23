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
        $bands = Band::join('albums', 'bands.album_id', '=', 'albums.id')
            ->groupBy('bands.album_id')
            ->select('bands.*', DB::raw("count(albums.id) as total_albums"))
            ->get();

        return view('bands.all', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('details', ['type' => 'band', 'openDrawer' => true]);
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

        $band = Band::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
            'slug' => Str::slug($validatedData['name']),
            'genres' => $validatedData['genres'] ?? null
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('bandsImages', 'public');
            $band->image = $path;
            $band->save();
        }

        return response()->json([
            'message' => 'Band created successfully',
            'redirect' => route('band.show', $band->slug)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $band = Band::with(['albums', 'artists'])
            ->where('slug', $slug)
            ->firstOrFail();
        
        return view('details', [
            'type' => 'band',
            'item' => $band,
            'albums' => $band->albums
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editBands = Band::where('id' , $id)
            ->first();

        return view('bands.edit', compact('editBands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Band $band)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'genres' => 'nullable|string'
        ]);

        $data = [
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
            'genres' => $validatedData['genres'] ?? null,
            'slug' => Str::slug($validatedData['name'])
        ];

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($band->image) {
                Storage::disk('public')->delete($band->image);
            }

            $path = $request->file('image')->store('bandsImages', 'public');
            $data['image'] = $path;
        }

        $band->update($data);

        return response()->json([
            'message' => 'Band updated successfully',
            'redirect' => route('band.show', $band->slug)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Band $band)
    {
        // Delete the band's image if it exists
        if ($band->image) {
            Storage::disk('public')->delete($band->image);
        }

        $band->delete();

        return redirect()->route('home')->with('message', 'Band deleted successfully');
    }
}
