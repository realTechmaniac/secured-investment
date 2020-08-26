<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvideHelp extends Model
{

    protected $fillable = [
        'user_id', 'amount', 'is_merged', 'status', 'is_activation_fee',
        'available_for_gh_at', 'expires_at', 'token', 'to_balance', 'is_withdrawn',
    ];


    public function getHelps()
    {
        return $this->belongsToMany(
            GetHelp::class,
            'merges',
            'provide_help_id',
            'get_help_id'
        )
            ->as('merge')
            ->withPivot('merge_amount', 'is_confirmed', 'expires_at')
            ->withTimestamps();
    }

    public function unConfirmedGh()
    {
        return $this->belongsToMany(
            GetHelp::class,
            'merges',
            'provide_help_id',
            'get_help_id'
        )
            ->wherePivot('is_confirmed', false)
            ->as('merge')
            ->withPivot('merge_amount', 'expires_at')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function receiptImage()
    {
        return $this->hasOne(ReceiptUpload::class, 'provide_help_id', 'id');
    }

    public function receiptUploads()
    {
        return $this->hasMany(ReceiptUpload::class, 'provide_help_id', 'id');
    }

}
