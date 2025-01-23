<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class magazine extends Model
{
    use HasFactory;

    // Define the table name if it's different from the plural form of the model name
    protected $table = 'magazines';

    // The attributes that are mass assignable
    protected $fillable = [
        'page_title', // Title of the magazine
        'image',      // Image file path
        'description', // Description of the magazine
        'status',     // Status of the magazine (active or inactive)
        'pdf',        // PDF file path
    ];

}
