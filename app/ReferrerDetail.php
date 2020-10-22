<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferrerDetail extends Model
{
    protected $fillable = [
        'user_id', 'referrer_link',
        'referrer_balance', 'token',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function referralHistories()
    {
        return $this->hasMany(ReferralHistory::class, 'referrer_details_id', 'id');
    }
}
