<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use App\Models\Seo;
use App\Models\Contact;
use App\Models\PeopleCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        $seo = Seo::first();
        $contact = Contact::first();
        $category = PeopleCategory::all();

        view()->share('seo_data', $seo);
        view()->share('contact_data', $contact);
        view()->share('cat_data', $category);
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
