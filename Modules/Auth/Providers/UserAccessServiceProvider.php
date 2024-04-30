<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class UserAccessServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //  ? register the main permisions on system.
        $this->loadAndRegisterPermisions();
    }

    public function loadAndRegisterPermisions()
    {
        $permisions = config(('system.permisions'));


        foreach ($permisions as $ability => $check) {

            if ( $check === null ) {
                $check = fn () => true;
            }

            Gate::define($ability, $check);
        }
    }
}
