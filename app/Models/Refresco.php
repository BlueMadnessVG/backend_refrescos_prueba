<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refresco extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'flavor',
        'time_spam'
     ];
}
