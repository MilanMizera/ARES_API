<?php

declare(strict_types=1);

namespace App\Extensions\Ares;

class Ares
{

    public function provideData(string $ico)
    {


        $aresUrl = 'https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/' . $ico;

        $response = file_get_contents($aresUrl, FALSE, stream_context_create(array(
            'http' => array(
                'ignore_errors' => true
            )
        )));

        $data = json_decode($response, true);



        $apiKey = 'hg8iVVPgHzAZIpAh5AoK5TZRR3aHgvrgKwZ8rA-Alrg';
        $address = ''. $data['nazevObce'] . $data['nazevUlice'] . $data['cisloDomovni'] ;

        $mapyUrl = 'https://api.mapy.cz/v1/geocode?apikey={$apiKey}&query={$adress}';


        return $data;
    }
}
