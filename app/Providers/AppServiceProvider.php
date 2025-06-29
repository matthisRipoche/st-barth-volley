<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

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
        View::composer(['front.layout', 'components.header', 'components.footer'], function ($view) {
            $headerMenu = Menu::with('items.page')->find(setting('header_menu_id'));
            $footerMenu = Menu::with('items.page')->find(setting('footer_menu_id'));

            $view->with('headerMenu', $headerMenu)->with('footerMenu', $footerMenu);
        });
    }
}
