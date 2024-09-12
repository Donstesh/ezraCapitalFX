<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'deposit_method', 'amount', 'deposit_status', 'trx_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
