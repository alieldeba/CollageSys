<?php

namespace App\View\Components;

use App\Models\Term;
use Illuminate\View\Component;

class nav extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav' , [
            'currentTerm' => Term::latest()->first()->id,
        ]);
    }
}
