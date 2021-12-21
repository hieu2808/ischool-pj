<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        // Một user được xem điểm khi: 
        // - user_profile là sinh viên, giáo viên 
        // - 
        Gate::define('duoc_xem_diem_sv', function ($user) {
            return $user->profile_type == 'App\Models\SinhVien';
        });

        // Gate::define('update-post', function ($user, $post) {
        //     return $user->id === $post->user_id;
        // });

    }
}
