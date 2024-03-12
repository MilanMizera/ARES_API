<?php

declare(strict_types=1);

namespace App\Extensions\Ares;

class Ares
{

    public function provideData(string $ico)
    {


        $aresUrl = 'https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/' . $ico;

        $responseAres = file_get_contents($aresUrl, FALSE, stream_context_create(array(
            'http' => array(
                'ignore_errors' => true
            )
        )));

        $aresData = json_decode($responseAres, true);

        bdump($aresData);

        $apiKey = 'hg8iVVPgHzAZIpAh5AoK5TZRR3aHgvrgKwZ8rA-Alrg';


        $adress =  $aresData['sidlo']['nazevUlice']. " " . $aresData['sidlo']['cisloDomovni']. ", " .$aresData['sidlo']['nazevObce'];
        $encodedAddress = urlencode($adress);



        $mapUrl = "https://api.mapy.cz/v1/geocode?apikey=$apiKey&query=$encodedAddress";



        $responseMap = file_get_contents($mapUrl, FALSE, stream_context_create(array(
            'http' => array(
                'ignore_errors' => true
            )
        )));
  
   

        $mapData = json_decode($responseMap, true);

        bdump($mapData);

        $result = [

            'ico' => $aresData['ico'],
            'datumVzniku' => $aresData['datumVzniku'],
            'datumAktualizace' => $aresData['datumAktualizace'],
            'obchodniJmeno' => $aresData['obchodniJmeno'],
            'pravniForma' => $aresData['pravniForma'],
            'sidlo' => $aresData['sidlo'],
            'lon' => $mapData['items'][0]['position']['lon'],
            'lat' => $mapData['items'][0]['position']['lat'],

        ];

        return $result;
    }
}
