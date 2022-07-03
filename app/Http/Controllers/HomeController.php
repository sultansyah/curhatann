<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hashtags;

class HomeController extends Controller
{
    public function index()
    {
        // cari cara mengambil hashtag terbanyak dibuat di dalam bulan tersebut
        // nanti ubah
        $hashtags = Hashtags::all();

        return view('home')->with(compact('hashtags'));
    }

    public function showByHashtags($hashtags)
    {
        $hashtags = Hashtags::where('hashtags', $hashtags);
        dump($hashtags);
    }
}