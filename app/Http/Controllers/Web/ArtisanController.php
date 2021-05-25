<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function artisan()
    {
        Artisan::call('migrate:fresh --seed');
        Artisan::call('storage:link');
        return 'DONE';
    }

    public function cache()
    {
        Artisan::call('cache:clear');
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('view:cache');
        return 'DONE';
    }
}
