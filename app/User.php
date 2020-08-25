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
        'first_name', 'last_name', 'phone_number', 'is_guider',
        'username', 'is_deactivated', 'is_blocked',
        'gender', 'token', 'misc_token', 'referred_from_id',
        'activation', 'role', 'email', 'sub_expires_at', 'password',
        'email_verified_at', 'phone_verification_code'
    ];

    protected $dates = [
        'sub_expires_at'
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
        $remove_whitespaces = preg_replace('!\s+!', '', $value);
        return ucfirst($remove_whitespaces);
    }
    public function getLastNameAttribute($value)
    {
        $remove_whitespaces = preg_replace('!\s+!', '', $value);
        return ucfirst($remove_whitespaces);
    }
    public function getUsernameAttribute($value)
    {
        $remove_whitespaces = preg_replace('!\s+!', '', $value);
        return strtolower($remove_whitespaces);
    }
    public function getGenderAttribute($value)
    {
        $remove_whitespaces = preg_replace('!\s+!', '', $value);
        return strtolower($remove_whitespaces);
    }
    public function getEmailAttribute($value)
    {
        return strtolower($value);
    }

    public function getPhoneAttribute($value)
    {
        $phone = substr($value, 4);  //remove "+234"
        return "0".$phone;
    }

    /**
     * Mutators
     *
     *
     * */
    public function setFirstNameAttribute($value)
    {
        //alternative ====>>  str_replace(' ', '', $value);
        $remove_whitespaces = preg_replace('!\s+!', '', $value);
        $this->attributes['first_name'] = strtolower($remove_whitespaces);
    }
    public function setLastNameAttribute($value)
    {
        $remove_whitespaces = preg_replace('!\s+!', '', $value);
        $this->attributes['last_name'] = strtolower($remove_whitespaces);
    }
    public function setUsernameAttribute($value)
    {
        $remove_whitespaces = preg_replace('!\s+!', '', $value);
        $this->attributes['username'] = strtolower($remove_whitespaces);
    }
    public function setGenderAttribute($value)
    {
        $remove_whitespaces = preg_replace('!\s+!', '', $value);
        $this->attributes['gender'] = strtolower($remove_whitespaces);
    }
    public function setEmailAttribute($value)
    {
        $remove_whitespaces = preg_replace('!\s+!', '', $value);
        $this->attributes['email'] = strtolower($remove_whitespaces);
    }
}
