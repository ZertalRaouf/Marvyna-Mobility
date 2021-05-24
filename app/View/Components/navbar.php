<?php

namespace App\View\Components;

use Illuminate\View\View;

class navbar
{
    public function compose(View $view)
    {
        $d = auth('driver')->user();
        return $view->with('d',$d);
    }
}
