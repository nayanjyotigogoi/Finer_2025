<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class director_profile extends Model
{
    use HasFactory;

    protected $table = 'director_profiles';

    protected $fillable = [
        'name',
        'photo',
        'position',
        'company',
        'address',
        'status',
        'description',
    ];
}
