<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getForm($type, $mode, $id = null)
    {
        // Map entity types to their respective views
        $viewMap = [
            'artist' => 'components.forms.artist-form',
            'band' => 'components.forms.band-form',
            'album' => 'components.forms.album-form',
        ];

        // Check if we have a view for this entity type
        if (!array_key_exists($type, $viewMap)) {
            return response()->view('components.forms.error', [
                'message' => 'Form not found for this entity type'
            ], 404);
        }

        // Get the entity data if we're in edit mode
        $data = null;
        if ($mode === 'edit' && $id) {
            $modelMap = [
                'artist' => \App\Models\Artist::class,
                'band' => \App\Models\Band::class,
                'album' => \App\Models\Album::class,
            ];

            $modelClass = $modelMap[$type];
            $data = $modelClass::find($id);

            if (!$data) {
                return response()->view('components.forms.error', [
                    'message' => 'Entity not found'
                ], 404);
            }
        }

        // Return the appropriate form view
        return view($viewMap[$type], [
            'mode' => $mode,
            'data' => $data
        ]);
    }
}
