<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\LoveCurhatan;

class LoveController extends Controller
{
    public function update($curhatan_id)
    {
        $curhatan = LoveCurhatan::where('curhatan_id', $curhatan_id)->where('user_id', Auth::id())->first();
        if (empty($curhatan)) {
            LoveCurhatan::create([
                'user_id' => Auth::id(),
                'curhatan_id' => $curhatan_id,
            ]);
            return back();
        }

        if ($curhatan->user_id == Auth::id()) {
            $curhatan->delete();
        }
    }
}