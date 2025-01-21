<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class past_president extends Model
{
    use HasFactory;


    protected $table = 'past_presidents';

    // Define fillable properties for mass assignment
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
