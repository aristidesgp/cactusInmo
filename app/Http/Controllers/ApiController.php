<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller{
    
    
    public function getApiData(){
        $token=config('app.token');
        $url=config('app.apiUrl');
        

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
