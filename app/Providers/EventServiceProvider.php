<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Registered::class => [
        //     SendEmailVerificationNotification::class,
        // ],
        \App\Events\CreateMember::class => [
             // \App\Listeners\CreatMember::class,
             \App\Listeners\SendEmailVerificationCreateMember::class,
       ],
       \App\Events\CancelRegisterEvent::class => [
             \App\Listeners\SendMailCancelRegister::class,
             \App\Listeners\LogEmail::class,
      ],
      \App\Events\FinishRegister::class => [
                 \App\Listeners\CreatePdfFile::class,
                 \App\Listeners\SendEmailVerificationCreateMember::class,
           ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
