<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferralHistory extends Model
{

    protected $fillable = [
        'referred_user_id', 'referrer_details_id',
    ];


    public function referrerDetail()
    {
        return $this->belongsTo(ReferrerDetail::class, 'referrer_details_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'referred_user_id', 'id');
    }
}
