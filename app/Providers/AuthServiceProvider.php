<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        \Illuminate\Pagination\Paginator::useBootstrap();

        $parameters = [
            'client_id' => config('oauth.dropbox.client_id'),
            'redirect_uri' => config('oauth.dropbox.redirect_uri'),
            'response_type' => 'code',
        ];

        View::share('oauth_dropbox_uri', 'https://www.dropbox.com/oauth2/authorize?' . http_build_query($parameters));
    }

}
