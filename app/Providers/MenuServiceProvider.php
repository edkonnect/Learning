<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
//    public function boot()
//    {
//        // get all data from menu.json file
//        $verticalMenuJson = file_get_contents(base_path('resources/json/verticalMenu.json'));
//        $verticalMenuData = json_decode($verticalMenuJson);
//        $horizontalMenuJson = file_get_contents(base_path('resources/json/horizontalMenu.json'));
//        $horizontalMenuData = json_decode($horizontalMenuJson);
//
//        // share all menuData to all the views
//        \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
//    }

    public function boot(Request $auth) {
        view()->composer('*', function ($view) use ($auth) {
            $user = $auth->user();
//            echo '<pre>';
//        print_r($user->roles); die;
            if (isset($user->roles) && $user->roles== 3) {
                // get all data from menu.json file
                $verticalMenuJson = file_get_contents(base_path('resources/json/verticalMenu.json'));
                $verticalMenuData = json_decode($verticalMenuJson);
                $horizontalMenuJson = file_get_contents(base_path('resources/json/horizontalMenu.json'));
                $horizontalMenuData = json_decode($horizontalMenuJson);

                // share all menuData to all the views
                \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
            } else {
                $verticalMenuJson = file_get_contents(base_path('resources/json/verticalMenuTutor.json'));
                $verticalMenuData = json_decode($verticalMenuJson);
                $horizontalMenuJson = file_get_contents(base_path('resources/json/horizontalMenututor.json'));
                $horizontalMenuData = json_decode($horizontalMenuJson);

                // share all menuData to all the views
                \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
            }
        });
    }

}
