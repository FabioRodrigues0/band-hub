<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardBand extends Component
{
    public $title;
    public $slug;
    public $subtitle;
    public $description;
    public $image;
    public $colors;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $slug, $subtitle, $description, $image)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->image = $image;
        $this->colors = ["blue", "gray", "red", "green", "yellow", "indigo", "purple", "pink"];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.card-band');
    }
}
