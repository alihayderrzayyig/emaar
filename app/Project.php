<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = [
        'title',
        'body',
        'show',
        'image',
    ];

    public function deleteImage(){
        Storage::delete($this->image);
    }
}
