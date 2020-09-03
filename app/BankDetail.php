<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{

    protected $fillable = [
        'user_id', 'full_name', 'bank_name',
        'account_number', 'token',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Accessors
     *
     *
     * */
    public function getFullNameAttribute($value)
    {
        return ucwords($value);
    }
    public function getBankNameAttribute($value)
    {
        return ucwords($value);
    }


    /**
     * Mutators
     *
     *
     * */
    public function setFullNameAttribute($value)
    {
        $this->attributes['full_name'] = strtolower($value);
    }
    public function setBankNameAttribute($value)
    {
        $this->attributes['bank_name'] = strtolower($value);
    }
}
