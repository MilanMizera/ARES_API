<?php

declare(strict_types=1);

namespace App\Model;

class CorporateInformation
{

    public function apiResponse($ico)
    {

        $url = 'https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/' . $ico;

        $response = file_get_contents( $url, FALSE, stream_context_create(array(
            'http' => array(
                'ignore_errors' => true
             )
        )));

        $data = json_decode($response, true);

        bdump($data);
       
    }





}
