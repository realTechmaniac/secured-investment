<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptUpload extends Model
{
    public function provideHelp()
    {
        return $this->belongsTo(ProvideHelp::class, 'provide_help_id', 'id');
    }

    public function fakeReceiptReporter()
    {
        return $this->belongsTo(User::class, 'reporter_user_id', 'id');
    }
}
