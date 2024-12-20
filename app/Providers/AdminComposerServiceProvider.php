<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AdminComposerServiceProvider extends ServiceProvider
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
                'admin/includes/top-info',
                'admin/home',
                'admin/contactformsubmissions',
                'admin/documentation/categories',
                'admin/documentation',
                'admin/editdocumentation',
                'admin/documentation/students',
                'admin/documentation/teachers',
                'admin/documentation/administrators',
                'admin/schools/registration'

            
            ], 
            
            'App\Http\ViewComposers\PrivateAdminViewComposer'
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
