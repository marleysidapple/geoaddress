<?php

namespace Marleysid\Geoaddress;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class GeoaddressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    protected $defer = false;

    public function boot()
    {

        AliasLoader::getInstance()->alias('Geoaddress', 'Marleysid\Geoaddress\Facade\GeoaddressFacade');
        $this->publishes([
            __DIR__ . '/config/geoaddress.php' => config_path('geo-address.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['Geoaddress'] = $this->app->share(function ($app) {
            $config                   = array();
            $config['applicationKey'] = Config::get('geo-address.applicationKey');

            return new Geoaddress($config);
        });
    }

    
}
