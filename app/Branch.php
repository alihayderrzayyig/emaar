<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Branch extends Model
{
    //
    protected $fillable = [
        'title',
        'body',
        'show',
        'image',
    ];

    public function deleteImage(){
        // Storage::delete($this->image);
        if (\File::exists(public_path($this->image))) {
            \file::delete(public_path($this->image));
        }
    }



}
