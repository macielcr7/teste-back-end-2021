<?php
namespace App\Services;

use GuzzleHttp\Client;
use \App\Models\Coins;

class CoinService {
    protected $baseUrl = 'https://economia.awesomeapi.com.br/json/';

    function getQuote($request){
        $coin1 = Coins::find($request->id_coin);
        $coin2 = Coins::find($request->id_coin_conversion);

		$client 	= new Client();
        $response 	= $client->request('GET', $this->baseUrl.$coin1->code.'-'.$coin2->code);
        if($response->getStatusCode()==200){
            $jsonArray  = json_decode($response->getBody()->getContents(), true);
            if(isset($jsonArray[0])){
                $cotacao = $jsonArray[0];

                return [
                    'coin_conversion'   => (float)$request->coin * (float)$cotacao[$request->type],
                    'type_value'        => (float)$cotacao[$request->type],
                ];
            }
        }

        return false;
	}

};