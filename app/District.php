<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'governorate_id'];

    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }
}
