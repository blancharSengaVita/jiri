<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View|\Illuminate\Foundation\Application|Factory|Htmlable|Closure|string|Application
    {
        return view('layouts.guest');
    }
}
