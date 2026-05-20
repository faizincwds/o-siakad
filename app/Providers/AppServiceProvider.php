<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Helpers\ThemeUI;

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
         // Ambil SEMUA data menu, meta, tema
        $themeUI = ThemeUI::getData();

        // Kirim ke SEMUA tampilan Blade
        View::share('menuItems', $themeUI['menuItems']);
        View::share('pageMeta',  $themeUI['pageMeta']);
        View::share('themeOpts', $themeUI['themeOpts']);
    }
}
