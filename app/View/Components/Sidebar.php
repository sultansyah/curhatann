<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $hashtags;

    public function __construct($hashtags)
    {
        $this->hashtags = $hashtags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}