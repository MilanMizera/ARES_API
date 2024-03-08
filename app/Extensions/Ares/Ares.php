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

        $aresData = json_decode($response, true);

        bdump($aresData);

        $apiKey = 'hg8iVVPgHzAZIpAh5AoK5TZRR3aHgvrgKwZ8rA-Alrg';
        $adress =  $aresData['sidlo']['nazevObce'] . " " . $aresData['sidlo']['nazevUlice'] . " " . $aresData['sidlo']['cisloDomovni'];
        bdump($adress);

        $mapUrl = "https://api.mapy.cz/v1/geocode?apikey={$apiKey}&query={$adress}";


        $response = file_get_contents($mapUrl, FALSE, stream_context_create(array(
            'http' => array(
                'ignore_errors' => true
            )
        )));

        $mapData = json_decode($response, true);


        $result = [

        'ico' => $aresData['ico'], 
        'datumVzniku' => $aresData['datumVzniku'],
        'datumAktualizace' => $aresData['datumAktualizace'],
        'obchodniJmeno' => $aresData['obchodniJmeno'],
        'pravniForma' => $aresData['pravniForma'],
        'sidlo' => $aresData['sidlo'],
        'mapUrl' => $mapUrl,
        
        
     ];

       
        
        return $result;
    }
}
