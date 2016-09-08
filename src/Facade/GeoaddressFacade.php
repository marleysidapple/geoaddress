<?php namespace Marleysid\Geoaddress\Facade;
 
use Illuminate\Support\Facades\Facade;
 
class GeoaddressFacade extends Facade {
 
    protected static function getFacadeAccessor() { return 'Geoaddress'; }
 
}