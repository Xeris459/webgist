<?php
namespace App\Controllers;

use \App\Controllers\BaseController;
use \App\Models\Mark_model;

class Map extends BaseController
{
    protected $path = 'public/assets/';

    public function __construct()
    {
        $this->Mark_model = new Mark_model;
        $this->validation = \Config\Services::validation();
        $this->controller = 'map';
    }

    public function index()
    {
        if(is_null(user()->lat) || is_null(user()->long)){
            $ip     = $this->request->getIPAddress();
            $ip     = '180.248.121.126';
            
            $c = curl_init();
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_URL, 'http://www.geoplugin.net/json.gp?ip=' . $ip);
            $loc = json_decode(curl_exec($c));
            curl_close($c);

            $long   = $loc->geoplugin_longitude;
            $lat    = $loc->geoplugin_latitude;
        } else {
            $long   = user()->long;
            $lat    = user()->lat;
        }

        $data = [
            'title'     => 'Map || ' . TITLE,
            'titleH'    => 'Map',
            'page'      => 'Map',
            'lon'       => $long,
            'lat'       => $lat
        ];

        return view('pages/map', $data);
    }
}

/* file location: app\Controllers\Map.php */
/* Snipped by Xeris459 */