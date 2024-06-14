<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    public function question()
{
    return $this->belongsTo(Question::class);
}


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function agrees(){
        return $this->hasMany('App\Models\Agree');
    }

    public function disagrees(){
        return $this->hasMany('App\Models\Disagree');
    }

}
