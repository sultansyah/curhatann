<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Hashtags;
use App\Models\Curhatan;
use App\Models\KomentarCurhatan;
use App\Models\LoveCurhatan;

class CurhatanController extends Controller
{
    public function index()
    {
        // cari cara mengambil hashtag terbanyak dibuat di dalam bulan tersebut
        // nanti ubah
        $hashtags = Hashtags::all();

        $curhatans = DB::table('curhatans')
            ->join('users', 'curhatans.user_id', '=', 'users.id')
            ->select('users.profile_photo_path', 'users.name', 'curhatans.*')
            ->get();

        $count_loves = DB::table('love_curhatans')
            ->join('curhatans', 'curhatans.id', '=', 'love_curhatans.curhatan_id')
            ->join('users', 'users.id', '=', 'love_curhatans.user_id')
            ->select(DB::raw('count(love_curhatans.id) as love_count, love_curhatans.curhatan_id'))
            ->groupBy('love_curhatans.curhatan_id')
            ->get();

        $komentars = DB::table('komentar_curhatans')
            ->join('curhatans', 'curhatans.id', '=', 'komentar_curhatans.curhatan_id')
            ->join('users', 'users.id', '=', 'komentar_curhatans.user_id')
            ->select('komentar_curhatans.*', 'users.name', 'users.profile_photo_path')
            ->get();

        return view('home')->with(compact('curhatans', 'hashtags', 'komentars', 'count_loves'));
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