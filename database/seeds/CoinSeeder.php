<?php

use Illuminate\Database\Seeder;

use GuzzleHttp\Client;
use \App\Models\Coins;

class CoinSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $conversions = ['BRL', 'USD', 'EUR'];

        $client     = new Client();
        $response   = $client->request('GET', 'https://economia.awesomeapi.com.br/json/available');
        $jsonArray  = json_decode($response->getBody()->getContents(), true);

        $jsonGroup = [];
        foreach ($jsonArray as $key => $value) {
            $temp = explode('-', $key);
            if(in_array($temp[0], $conversions)){
                $jsonGroup[$temp[0]][] = $temp[1];
            }
        }

        $client     = new Client();
        $response   = $client->request('GET', 'https://economia.awesomeapi.com.br/json/available/uniq');
        $jsonArray  = json_decode($response->getBody()->getContents(), true);

        $conversionsRows = [];

        foreach ($conversions as $index => $code) {
            $coin = Coins::create([
                'code'              => $code,
                'description'       => $jsonArray[$code],
                'conversion'        => 'S'
            ]);
            $conversionsRows[$code] = $coin;
        }

        foreach ($jsonArray as $code => $desc) {
            $check = [];
            foreach ($jsonGroup as $codeConversion => $items) {
                if(in_array($code, $items)){
                    $check[] = $conversionsRows[$codeConversion]->id;
                }
            }
            
            if(!in_array($code, $conversions)){
                $coin = Coins::create([
                    'code'              => $code,
                    'description'       => $desc,
                    'conversion'        => 'N'
                ]);
            }
            else{
                $coin = Coins::identic('code', $code)->first();
            }

            $coin->conversions()->sync($check);
        }
    }
}