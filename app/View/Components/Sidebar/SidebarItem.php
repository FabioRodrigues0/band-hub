<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class SidebarItem extends Component
{
    public function __construct(
        public string $href = '#',
        public string $icon = '',
        public string $text = '',
        public bool $disabled = false
    ) {}

    public function render()
    {
        return view('components.sidebar.sidebar-item');
    }
}
