<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'dateofbirth',
        'aboutme',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',

    ];

    public function setPasswordAttribute($value){
    $this->attributes['password'] = bcrypt($value);
    }


    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    /// questions

    public function questions(){
        return $this->hasMany('App\Models\Question');
    }
    public function opinions(){
        return $this->hasMany('App\Models\Opinion');
    }

    public function agrees(){
        return $this->hasMany('App\Models\Agree');
    }
    public function disagrees(){
        return $this->hasMany('App\Models\Disagree');
    }

}
