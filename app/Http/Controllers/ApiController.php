<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    
    //Se optienen los datos desde la API y devuelve Array de Propiedades
    public function getApiData(){
        $token='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImlhdCI6MTYzODgxNzM3MH0.eyJzZXJ2aWNlQ29uc3VtZXJJZCI6MTg3LCJ0eXBlSWQiOjcsImNsaWVudElkIjoyNTkwLCJvZmZpY2VJZCI6NDM2OH0.wqcbLPs4I0YAa0HN4rxiV5S0waqx7SI2_Ckv_CwubJo';
        $url='https://api.whise.eu';

        $response = Http::withOptions([
            'verify' => false,
        ])->withToken($token )->post( $url . '/v1/estates/list', [
            'filter' => [
                'statusIds'           => [1, 5, 6],                
                'LanguageId'          => "fr-BE",
                'ShowRepresentatives' => true,
            ],
            'page' => [
                'limit' => 10
            ]
        ]);
        $responseArray=$response->collect()->get('estates');
        return $responseArray;
    }
    
}
