<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'first_name', 'last_name', 'phone',
        'username', 'is_deactivated', 'is_blocked',
        'gender', 'token', 'misc_token', 'referred_from_id',
        'activation', 'role', 'email', 'sub_expires_at', 'password',
        'email_verified_at', 'phone_verification_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function provideHelps()
    {
        return $this->hasMany(ProvideHelp::class, 'user_id', 'id');
    }

    public function getHelps()
    {
        return $this->hasMany(GetHelp::class, 'user_id', 'id');
    }

    public function bankDetail()
    {
        return $this->hasOne(BankDetail::class, 'user_id', 'id');
    }

    public function referrerDetail()
    {
        return $this->hasOne(ReferrerDetail::class, 'user_id', 'id');
    }

    public function senderChats()
    {
        return $this->hasMany(Chat::class, 'from_id', 'id');
    }

    public function receiverChats()
    {
        return $this->hasMany(Chat::class, 'to_id', 'id');
    }

    public function reportedReceipts()
    {
        return $this->hasMany(ReceiptUpload::class, 'reporter_user_id', 'id');
    }

    public function referrerHistory()
    {
        return $this->hasOne(ReferralHistory::class, 'referred_user_id', 'id');
    }

    /**
     * Accessors
     *
     *
     * */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getUsernameAttribute($value)
    {
        return strtolower($value);
    }
    public function getGenderAttribute($value)
    {
        return strtolower($value);
    }
    public function getEmailAttribute($value)
    {
        return strtolower($value);
    }

    /**
     * Mutators
     *
     *
     * */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtolower($value);
    }
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }
    public function setGenderAttribute($value)
    {
        $this->attributes['gender'] = strtolower($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
