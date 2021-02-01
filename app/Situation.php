<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'status',
        'image',
        'description',
    ];


    public function deleteImage(){
        Storage::delete($this->image);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function gifts(){
        return $this->hasMany(Gift::class);
    }
}
