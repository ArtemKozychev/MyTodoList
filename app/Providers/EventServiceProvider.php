<?php

namespace App\Providers;

use App\Jobs\SendConfirmationEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendConfirmationEmail::class
        ]
    ];
}
