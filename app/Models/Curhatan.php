<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curhatan extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'hashtags', 'isi', 'user_id'];
}