<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable = [
        'user_id',
        'situation_id',
        'name',
        'phone',
        'gift',
        'governorate',
        'district',
        'region',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function situation()
    {
        return $this->belongsTo(Situation::Class);
    }
}
