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
    public function getAccountNumberAttribute($value)
    {
        return (int)$value;
    }
    public function getAccountTypeAttribute($value)
    {
        return ucfirst($value);
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
    public function setAccountNumberAttribute($value)
    {
        $this->attributes['account_number'] = (int)$value;
    }
    public function setAccountTypeAttribute($value)
    {
        $this->attributes['account_type'] = strtolower($value);
    }
}
