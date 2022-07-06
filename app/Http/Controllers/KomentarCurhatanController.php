<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\KomentarCurhatan;

class KomentarCurhatanController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'komentar' => 'required',
        ]);

        KomentarCurhatan::create([
            'komentar' => $request->komentar,
            'curhatan_id' => $request->curhatan_id,
            'user_id' => Auth::id()
        ]);

        $pesan = "Berhasil";

        return back()->with(compact('pesan'));
    }

    public function show($id)
    {
        //
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