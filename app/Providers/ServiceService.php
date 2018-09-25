<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Service;

class ServiceService
{
    public static function getServices() {
        return Service::all();

    }
}
