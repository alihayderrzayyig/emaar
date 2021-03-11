<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Situation extends Model
{
    use Sluggable;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'governorate',
        'district',
        'region',
        'money',
        'achieve',
        'status',
        'image',
        'description',
        'slug',
    ];


    public function deleteImage()
    {
        // Storage::delete($this->image);
        if (\File::exists(public_path($this->image))) {
            \file::delete(public_path($this->image));
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }

    public function completed()
    {
        return intval($this->achieve/$this->money*100);
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
