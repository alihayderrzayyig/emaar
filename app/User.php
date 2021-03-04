<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InvoicePaid;//to use slug package
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    //to use slug package
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_id',
        'name',
        'slug',
        'email',
        'password',
        'isAdmin',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::Class);
    }

    public function socialProviders(){
        return $this->hasMany(SocialProvider::class);
    }

    public function situations(){
        return $this->hasMany(Situation::class);
    }
    public function gifts(){
        return $this->hasMany(Gift::class);
    }

    public function authUserLogin(){

        if(Auth::user()->id == $this->id){
            return true;
        }else{

            return false;
        }
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }


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
