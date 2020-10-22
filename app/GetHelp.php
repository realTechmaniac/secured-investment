<?php

namespace App;

use App\Http\Controllers\AppMainTrait;
use Illuminate\Database\Eloquent\Model;

class GetHelp extends Model
{
    use AppMainTrait;

    protected $fillable = [
        'user_id', 'amount', 'is_merged', 'status', 'token', 'provide_help_id',
        'to_balance', 'profit', 'sub_expires_at', 'added_referral_bonus'
    ];


    public function provideHelps()
    {
        return $this->belongsToMany(
            ProvideHelp::class,
            'merges',
            'get_help_id',
            'provide_help_id'
        )
            ->as('merge')
            ->withPivot('merge_amount', 'is_confirmed', 'expires_at')
            ->withTimestamps();
    }

    public function unConfirmedPh()
    {
        return $this->belongsToMany(
            ProvideHelp::class,
            'merges',
            'get_help_id',
            'provide_help_id'
        )
            ->wherePivot('is_confirmed', false)
            ->as('merge')
            ->withPivot('merge_amount', 'expires_at')
            ->withTimestamps();
    }

    public function receiptUploads()
    {
        return $this->hasMany(ReceiptUpload::class, 'get_help_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
