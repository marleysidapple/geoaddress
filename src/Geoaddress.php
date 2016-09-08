<?php namespace Marleysid\Geoaddress;

class Geoaddress
{

    /*
    |--------------------------------------------------------------------------
    | Application Key
    |--------------------------------------------------------------------------
    |
    | Google API Key
    |
     */
    protected $applicationKey;

    /*
     * Setting application key
     *
     */

    public function __construct($config)
    {
        $this->applicationKey = $config['applicationKey'];
    }

    /*
     * Get the Lat lng from provided address by user
     * Successful result will return Latitude and longitude for the given place
     *
     */
    public function latlng($address)
    {
        $parameters = array(
            'address' => $address,
            'sensor'  => 'false',
            'key'     => $this->applicationKey,
        );

        if (!$this->applicationKey) {
            throw new \Exception('An application key has not been set. Please set application key');
        }

        if (!$address) {
            throw new \Exception('Address not provided or invalid');
        }

        $client        = new \GuzzleHttp\Client();
        $response      = $client->get('https://maps.googleapis.com/maps/api/geocode/json?', array('query' => $parameters));
        $response_json = $response->json();

        if (empty($response_json['results'][0]['geometry']['location']['lat']) || empty($response_json['results'][0]['geometry']['location']['lng'])) {
            throw new \Exception('Address invalid or empty response');
        }
        $coordinates = $response_json['results'][0]['geometry']['location'];
        return $coordinates;

    }

}
