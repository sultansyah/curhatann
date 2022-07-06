<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarCurhatan extends Model
{
    use HasFactory;

    protected $fillable = ['komentar', 'curhatan_id', 'user_id'];
}