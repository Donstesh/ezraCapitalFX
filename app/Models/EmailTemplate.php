<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    // Add the fillable properties
    protected $fillable = [
        'subject',
        'body',
        'user_id',
        'user_email',
        'user_full_name',
    ];
}
