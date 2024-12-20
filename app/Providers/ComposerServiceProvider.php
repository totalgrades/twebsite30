<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                'welcome',
                'features',
                'schoolRegistrationForm',
                'contact',
                'videos',
                'includes/header',
                'documentation/alldocumentation',
                'documentation/showdocumentation'
            
            ], 
            
            'App\Http\ViewComposers\PublicViewComposer'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
