<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function deleteImage(){

        if (\File::exists(public_path($this->avatar))) {
            \file::delete(public_path($this->avatar));
        }

        // Storage::delete($this->avatar);

    }


    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
