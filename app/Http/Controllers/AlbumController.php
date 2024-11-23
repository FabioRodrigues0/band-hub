<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use App\Services\AlbumService;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Constructor to set middleware
     */
    public function __construct(
        protected AlbumService $albumService
    ) {
        // Apply auth middleware only to create, edit, update, and delete methods
        $this->middleware('auth')->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::with(['band', 'artists'])->get();

        return view('list', [
            'type' => 'album',
            'items' => AlbumResource::collection($albums)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumRequest $request)
    {
        $album = $this->albumService->create($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Album created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $albums = Album::with(['band', 'tracks', 'artists'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('details', [
            'type' => 'albums',
            'item' => new AlbumResource($albums),
            'tracks' => $albums->tracks
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlbumRequest $request, Album $album)
    {
        $this->authorize('update', $album);

        $this->albumService->update($album, $request->validated());

        return redirect()
            ->back()
            ->with('success', 'Album updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $this->authorize('delete', $album);

        $this->albumService->delete($album);

        return redirect()
            ->route('albums.index')
            ->with('success', 'Album deleted successfully!');
    }
}
