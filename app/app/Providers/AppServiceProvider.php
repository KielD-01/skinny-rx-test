<?php

namespace App\Providers;

use App\Events\Api\SubmissionSavedEvent;
use App\Listeners\Api\SubmissionSavedListeners;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $events = [
        [SubmissionSavedEvent::class, [SubmissionSavedListeners::class, 'handle']]
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerEvents();
    }

    private function registerEvents(): void
    {
        collect($this->events)->each(fn($payload) => Event::listen(...$payload));
    }
}
