<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function sentFrom()
    {
        return $this->belongsTo(User::class, 'from_id', 'id');
    }

    public function sentTo()
    {
        return $this->belongsTo(User::class, 'to_id', 'id');
    }


}
