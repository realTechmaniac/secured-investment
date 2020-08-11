<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{

    protected $fillable = [
        'user_id', 'full_name', 'bank_name',
        'account_number', 'account_type', 'token',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
