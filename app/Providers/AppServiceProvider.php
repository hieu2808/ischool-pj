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
        Gate::define('onlySV', function ($user) {
            return $user->profile_type == 'App\Models\SinhVien';
        });
        Gate::define('onlyGV', function ($user) {
            return $user->profile_type == 'App\Models\GiaoVien';
        });
        Gate::define('onlyAD', function ($user) {
            return $user->profile_type == 'App\Models\AdminProfile';
        });

        // Gate::define('update-post', function ($user, $post) {
        //     return $user->id === $post->user_id;
        // });

    }
}
