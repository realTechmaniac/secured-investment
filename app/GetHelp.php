<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetHelp extends Model
{

    protected $fillable = [
        'user_id', 'amount', 'is_merged', 'status', 'token',
    ];


    public function provideHelps()
    {
        return $this->belongsToMany(
            ProvideHelp::class,
            'merges',
            'get_help_id',
            'provide_help_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
