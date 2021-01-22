<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'governorate',
        'district',
        'region',
        'birthdate',
        'avatar',
        'completed'
    ];




    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
