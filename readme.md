# Google geoaddress coordinates

Get coordinates of the place by passing address as a string.


### Prerequisities

this will require guzzle. so first make sure you have installed guzzle.

```
"guzzlehttp/guzzle": "~4.0"
```

### Installing

To install, edit your `composer.json` and add the line mentioned below.

```
"marleysidapple/geoaddress": "dev-master"

```

Then run `composer update`


### Configuration

After installation, go to `config/app.php`. Add 

```
 Marleysid\Geoaddress\GeoaddressServiceProvider::class,

```
in provider array. Add `alias` as well in alias array

```
 'Geoaddress'=> Marleysid\Geoaddress\Facade\GeoaddressFacade::class,

```


For publishing `configuration`. Run following command

```
php artisan vendor:publish

```

Once publish is completed open `config/geo-address.php` and set `applicationkey`


##Example

include `use Marleysid\Geoaddress\Geoaddress;` in the controller

```
$response  = \Geoaddress::latlng('Berlin, Germany');

$lat = $response['lat'];
$lng = $response ['lng'];

``` 





## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.


## Authors

* **Siddhartha Bhatta** - *Initial work* - [marleysidapple](https://github.com/marleysidapple)


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


## Acknowledgments

* alexpechkarev/google-geocoder
