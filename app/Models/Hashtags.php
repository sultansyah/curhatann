<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtags extends Model
{
    use HasFactory;
    protected $fillable = ['hashtag'];
}