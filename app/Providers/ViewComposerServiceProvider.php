<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeUserRolePermission();
    }

    /**
     * compose partial view 
     */
    private function composeUserRolePermission()
    {
        View::composer(
            'admin.settings.role.index',
            function ($view){
                $view->with('roles', getUserRoleAndPermission());
            }
        );
    }
}
