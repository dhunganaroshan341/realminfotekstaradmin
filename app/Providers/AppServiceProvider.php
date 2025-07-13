<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\frontend;
use App\Models\Service;
use App\Models\WorkingDay;
use Illuminate\Pagination\Paginator;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->composeFrontendViews([
            'frontend.layout.main',
            'frontend.layout.footer',
            'frontend.contact'
        ]);

        $this->composeFrontendViews([
            'frontend-tailwind.layout.main',
            'frontend-tailwind.layout.footer',
            'frontend-tailwind.contact'
        ]);

        Paginator::useBootstrapFive();
    }

    protected function composeFrontendViews(array $views): void
    {
        View::composer($views, function ($view) {
            $setting = Setting::first();
            $services = Service::where('status', 1)->latest()->take(4)->get();

            $view->with([
                'email' => $setting->email ?? '',
                'title' => $setting->title ?? '',
                'address' => $setting->address ?? '',
                'contact' => $setting->contact ?? ' +977 01-5529237 | 9851056649',
                'contact_2' => $setting->contact_2 ?? ' +977 01-5529237 | 9851056649',
                'description' => $setting->description ?? '',
                'logo' => $setting->logo ?? '',
                'work_description' => $setting->work_description ?? '',
                'about_description' => $setting->about_description ?? '',
                'welcome_description' => $setting->welcome_description ?? '',
                'welcome_image' => $setting->welcome_image ?? '',
                'about_image' => $setting->about_image ?? '',
                'facebook' => $setting->facebook_url ?? '',
                'twitter' => $setting->twitter_url ?? '',
                'instagram' => $setting->instagram_url ?? '',
                'github' => $setting->github_url ?? '',
                'workdesc' => WorkingDay::all(),
                'services' => $services
            ]);
        });
    }

}
