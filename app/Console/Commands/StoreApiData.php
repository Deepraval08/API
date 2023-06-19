<?php

namespace App\Console\Commands;

use App\Models\Coin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class StoreApiData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coin:store-api-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieves data from the Coingecko API endpoint and stores it in a database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/coins/list?include_platform=true');
        
        $coin_data = $response->json();

        foreach($coin_data as $data)
        {
            Coin::create([
                'id' => $data['id'],
                'symbol' => $data['symbol'],
                'name' => $data['name'],
                'platforms' => json_encode($data['platforms']),
            ]);
        }
           
        //logs the message on the console.
        $this->info('Store the coin data into Database successfully !!!');
    } 
}
