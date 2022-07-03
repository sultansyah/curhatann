<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Hashtags;
use App\Models\Curhatan;

class CurhatanController extends Controller
{
    public function index()
    {
        // cari cara mengambil hashtag terbanyak dibuat di dalam bulan tersebut
        // nanti ubah
        $hashtags = Hashtags::all();
        $curhatans = Curhatan::all();

        return view('home')->with(compact('curhatans', 'hashtags'));
    }

    public function showByHashtag($hashtag)
    {
        $hashtag = Hashtags::where('hashtag', $hashtag);
        dump($hashtag);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'hashtags' => 'required',
        ]);

        Curhatan::create([
            'judul' => $request->judul,
            'hashtags' => $request->hashtags,
            'isi' => $request->isi,
            'user_id' => Auth::id()
        ]);

        $pesan = "Berhasil";

        return back()->with(compact('pesan'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}