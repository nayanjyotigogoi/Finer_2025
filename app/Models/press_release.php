<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class press_release extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'press_releases';

    // The attributes that are mass assignable
    protected $fillable = [
        'page_title',
        'image',
        'description',
        'status',
        'pdf',
    ];
}
