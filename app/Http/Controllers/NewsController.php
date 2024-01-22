<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{

    public function index(Request $request)
    {
        try {
            $apiKey = '0457c2c54fab4f7b974cb409d39ae3c1';
            // yang dibawah ini untuk melakukan search pencarian API dari name cari
            $searchTerm = $request->input('cari');
            // ini di gunakan untuk dari hari ini ssampai hari selanjut nya ada berita apa
            $datefrom= $request->input('from');
            $dateto=$request->input('to');

            // dibawah ini adalah sebuah kondisi yang dimana   kondisi in i sangat berpengaruh dalam 
            // sebuah pencarian berita yang menggunakan API
            if ($searchTerm) {
                $endpoint = "https://newsapi.org/v2/everything?q=$searchTerm&apiKey=$apiKey&from=$datefrom&to=$dateto";
            } else {
                $endpoint = "https://newsapi.org/v2/top-headlines?country=id&apiKey=$apiKey";
            }
            // Baris ini menggunakan fungsi Http::get() untuk melakukan permintaan HTTP GET ke endpoint yang ditentukan.
            //  Nilai endpoint tersebut disimpan dalam variabel $endpoint. Fungsi ini mengembalikan objek respons HTTP.
            $response = Http::get($endpoint);

            if (!isset($response->json()['articles'])) {
                throw new \Exception('Invalid API response. Missing "articles" key.');
            }
            // ini digunakan untukmengambildata judul article dan yang lain nya
            // Baris ini mengambil data 'articles' dari respons JSON yang dikembalikan oleh objek $response. Kode ini
            //  mengasumsikan bahwa respons JSON berbentuk array asosiatif dan berisi kunci 'articles'.
            $articles = $response->json()['articles'];
            // Bagian yang ini menggunakan fungsi array_map untuk mengiterasi setiap elemen dalam array $articles. Fungsi ini menerapkan fungsi callback pada setiap elemen, 
            // yang memodifikasi nilai 'publishedAt' dari setiap artikel. Jika nilai 'publishedAt' sudah ada, maka nilai tersebut akan di-parse menggunakan library Carbon 
            // dan diformat sebagai 'Y-m-d H:i:s'. Jika nilai 'publishedAt' tidak ada, maka nilainya akan diatur sebagai null. Array artikel yang telah dimodifikasi kemudian di-
            // assign kembali ke variabel $articles
            $articles = array_map(function ($article) {
                $article['publishedAt'] = isset($article['publishedAt']) ? \Carbon\Carbon::parse($article['publishedAt'])->format('Y-m-d H:i:s') : null;
                return $article;
            }, $articles);

            // Bagian ini menangkap setiap pengecualian yang terjadi dalam blok try. Jika pengecualian ditangkap, maka akan mengembalikan tampilan yang 
            // disebut 'error' dan meneruskan pesan kesalahan 
            // dalam bentuk array asosiatif ke tampilan tersebut. Kode status HTTP 500 juga diatur untuk respons tersebut.

            return view('news', compact('articles', 'searchTerm'));
        } catch (\Exception $e) {
            return response()->view('error', ['error' => $e->getMessage()], 500);
        }
    }
}
