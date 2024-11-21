<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardArtist extends Component
{
    public $name;
    public $slug;
    public $image;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $slug, $image)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.card-artist');
    }
}
