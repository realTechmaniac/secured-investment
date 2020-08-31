<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptUpload extends Model
{

    protected $fillable = [
        'provide_help_id', 'get_help_id', 'merge_amount', 'action_taken',
        'image', 'is_fake', 'token', 'expires_at', 'is_confirmed'
    ];


    public function provideHelp()
    {
        return $this->belongsTo(ProvideHelp::class, 'provide_help_id', 'id');
    }

    public function fakeReceiptReporter()
    {
        return $this->belongsTo(User::class, 'reporter_user_id', 'id');
    }

    public function getHelp()
    {
        return $this->belongsTo(GetHelp::class, 'get_help_id', 'id');
    }

    public static function uploadReceiptToStorage($image)
    {
        return $image->store('ph-receipts');
    }
}
