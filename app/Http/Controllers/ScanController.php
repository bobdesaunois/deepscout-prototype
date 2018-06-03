<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanController
{

    public function search (Request $request)
    {

        $client = new \GuzzleHttp\Client ();

        $response = $client->request
        (
            "GET",
            "https://api.shodan.io/shodan/host/search?key=" . env ("SHODAN_API_KEY") . "&query=" . $request->get ("query")
        );

        $response = $response->getBody ()
            ->getContents();

        return $response;

    }

}