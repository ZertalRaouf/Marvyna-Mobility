<?php

namespace App\View\Components;

use Illuminate\View\View;

class navbar_user
{
    public function compose(View $view)
    {
        $u = auth()->user();
        return $view->with('u',$u);
    }
}
