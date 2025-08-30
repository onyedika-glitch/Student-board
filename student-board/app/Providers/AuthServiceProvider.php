<?php
namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\{Announcement, Event, Timetable, Result, User};
use App\Policies\{AnnouncementPolicy, EventPolicy, TimetablePolicy, ResultPolicy};

class AuthServiceProvider extends ServiceProvider {
    protected $policies = [
        Announcement::class => AnnouncementPolicy::class,
        Event::class => EventPolicy::class,
        Timetable::class => TimetablePolicy::class,
        Result::class => ResultPolicy::class,
    ];
    public function boot(): void
{
    $this->registerPolicies();

    Gate::before(function ($user, $ability) {
        if ($user->role === 'admin') {
            return true; // allow everything
        }
    });

}


    }
}
