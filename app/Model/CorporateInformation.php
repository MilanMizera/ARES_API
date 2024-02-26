<?php

declare(strict_types=1);

namespace App\Model;

class CorporateInformation
{




    public function takeCorporateInformation()
    {

        $url = 'https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/<ICO>';

        $response = file_get_contents($url);

        $data = json_decode($response, true);

        var_dump($data);
    }





}
