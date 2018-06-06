<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;



class weatherController extends Controller
{
  public function saveApiData()
  {
    $token = '52044d612c2db5c8345dcfb617074886';

    $headers = [
        'Authorization' => 'Bearer ' . $token,
        'Accept'        => 'application/json',
    ];
    
      $client = new Client;
      $response = $client->request('GET', 'bar', [
        'headers' => $headers
    ]);
      $res = $client->request('GET',
       'api.openweathermap.org/data/2.5/forecast/daily?q=London&mode=xml&units=metric&cnt=7',
       [
          'headers' => $headers
      ]);
      echo $res->getStatusCode();
      echo $res->getHeader('content-type');
      echo $res->getBody();
}
}
