<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycVerify extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'f_name',
        'l_name',
        'email',
        'document_1',
        'document_1_govt',
        'document_1_name',
        'ssn',
        'document_1_no',
        'document_1_image_front',
        'document_1_image_back',
        'status',
        'document_2',
        'document_2_name',
        'address',
        'document_2_image',
        'document_2_exp_date',
        'document_3_selfie'
    ];
}
