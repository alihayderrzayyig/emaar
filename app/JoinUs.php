<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinUs extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'governorate',
        'district',
        'region',
        'description',
    ];
}
