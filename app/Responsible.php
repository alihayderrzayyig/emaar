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
        Storage::delete($this->image);
    }
}
