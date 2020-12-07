<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PublicPathServiceProvider extends ServiceProvider
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
        view()->composer('layout', function($view) {
            $public = env('APP_DEBUG', false) ? '' : 'public/';

            $favicon = url($public.'images/favicon.png');
            $rtl = __('app.dir') === 'rtl';
            $uikit_css = $rtl ? url($public.'css/uikit-rtl.min.css') : url('css/uikit.min.css');
            $small = url('css/small.css');
            $css = "<link rel='shortcut icon' type='image/png' href='$favicon'>"
                  ."<link rel='stylesheet' href='$uikit_css'>"
                  ."<link rel='stylesheet' media='screen and (max-width: 600px)' href='$small'>";

            $uikit_js = url($public.'js/uikit.min.js');
            $uikit_icons = url($public.'js/uikit-icons.min.js');
            $home = url($public.'js/home.js');
            $js = "<script src='$uikit_js'></script>"
                  ."<script src='$uikit_icons'></script>"
                  ."<script src='$home'></script>";

            return $view->with('css', $css)->with('js', $js);
        });
    }
}
