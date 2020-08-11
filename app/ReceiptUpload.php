<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptUpload extends Model
{

    protected $fillable = [
        'provide_help_id', 'reporter_user_id',
        'image', 'reason', 'is_fake', 'token',
    ];


    public function provideHelp()
    {
        return $this->belongsTo(ProvideHelp::class, 'provide_help_id', 'id');
    }

    public function fakeReceiptReporter()
    {
        return $this->belongsTo(User::class, 'reporter_user_id', 'id');
    }
}
