<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvideHelp extends Model
{

    protected $fillable = [
        'user_id', 'amount', 'is_merged', 'status', 'is_activation_fee',
        'available_for_gh_at', 'expires_at', 'token',
    ];


    public function getHelps()
    {
        return $this->belongsToMany(
            GetHelp::class,
            'merges',
            'provide_help_id',
            'get_help_id'
        );
    }

    public function confirmedPh()
    {
        return $this->belongsToMany(
            GetHelp::class,
            'merges',
            'provide_help_id',
            'get_help_id'
        )->wherePivot('is_confirmed', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function receiptImage()
    {
        return $this->hasOne(ReceiptUpload::class, 'provide_help_id', 'id');
    }

}
