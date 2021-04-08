<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{
    use Sluggable;


    protected $fillable = [
        'title',
        'body',
        'show',
        'slug',
        'image',
    ];

    public function deleteImage()
    {
        // Storage::delete($this->image);
        if (\File::exists(public_path($this->image))) {
            \file::delete(public_path($this->image));
        }
    }





    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
