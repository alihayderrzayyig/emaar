<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Responsible extends Model
{
    protected $fillable = [
        'name',
        'body',
        'image',
    ];


    public function deleteImage(){
        // Storage::delete($this->image);
        if (\File::exists(public_path($this->image))) {
            \file::delete(public_path($this->image));
        }
    }
}
