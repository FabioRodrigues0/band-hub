<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardAlbum extends Component
{
    public $title;
    public $subtitle;
    public $description;
    public $image;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $subtitle, $description, $image)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->image = $image;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.card-album');
    }
}
