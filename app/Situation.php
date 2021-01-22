<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Situation extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'governorate',
        'district',
        'region',
        'money',
        'image',
        'description',
    ];




    public function user(){
        return $this->belongsTo(User::class);
    }
}
