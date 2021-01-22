<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $fillable = ['name'];

    public function districts(){
       return $this->hasMany(District::class);
    }

}
