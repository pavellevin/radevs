<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('roles.modals.add_role', 'App\Http\ViewComposers\RoleComposer');
        View::composer('users.modals.add_user', 'App\Http\ViewComposers\UserComposer');
        View::composer('tests.modals.add_test', 'App\Http\ViewComposers\TestComposer');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
