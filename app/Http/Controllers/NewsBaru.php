<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsBaru extends Controller
{
    public function News(){
        
              // GET https:newsapi.org/v2/everything?q=tesla&from=2023-12-11&sortBy=publishedAt&apiKey=0457c2c54fab4f7b974cb409d39ae3c1
              $response=Http::get('https://newsapi.org/v2/top-headlines/sources?apiKey=API_KEY0'
            .getenv('NEWS_API_KEY'));
              dd($response);
    }
}
