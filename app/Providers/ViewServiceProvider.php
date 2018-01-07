<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 01/02/2017
 * Time: 18:51.
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ViewServiceProvider.
 */
class ViewServiceProvider extends ServiceProvider
{
    /**
     *  Register component views.
     */
    public function register()
    {
        /*
         * Load the dashboard/admin blade files for views creation.
         */
        $this->loadViewsFrom(resource_path('admin/views'), 'dashboard');

        /*
         * Load the websites frontend blade files for views creation.
         */
        $this->loadViewsFrom(resource_path('views'), 'website');

        /*
         * Load the module view blade files dynamically.
         */
        $this->loadViewsFrom(base_path('app/Modules'), 'modules');

        /*
         * Load the plugins view blade files dynamically.
         */
        $this->loadViewsFrom(base_path('app/Plugins'), 'plugins');

        /*
         * Errors can be overwritten by the front end website, default to dashboard errors.
         */
        $this->loadViewsFrom([resource_path('views/errors'), resource_path('admin/views/errors')], 'errors');
    }
}
