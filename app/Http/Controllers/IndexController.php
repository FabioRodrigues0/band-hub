<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Band;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::latest()->take(4)->get();
        $bands = Band::latest()->take(4)->get();
        $albums = Album::latest()->take(9)->get();
        $recentlyPlayed = Album::latest()->take(4)->get(); // For now, just showing latest albums as recently played

        return view('home', compact('artists', 'albums', 'bands', 'recentlyPlayed'));
    }

    /**
     * Display a listing of the resource.
     */
    public function list($type)
    {
        $items = match ($type) {
            'artists' => Artist::with('bands')->latest()->paginate(15),
            'bands' => Band::with(['artists', 'albums'])->latest()->paginate(15),
            'albums' => Album::with('band')->latest()->paginate(15),
            default => abort(404),
        };

        return view('list', [
            'items' => $items,
            'type' => $type
        ]);
    }

    /**
     * Search across all resources.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');

        $artists = Artist::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->take(4)
            ->get();

        $bands = Band::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->take(4)
            ->get();

        $albums = Album::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->take(4)
            ->get();

        return response()->json([
            'artists' => $artists,
            'bands' => $bands,
            'albums' => $albums
        ]);
    }
}
