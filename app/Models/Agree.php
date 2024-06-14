<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agree extends Model
{
    protected $fillable = [
        'opinion_id',
        
    ];
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function opinions(){
        return $this->belongsTo('App\Models\Opinion');
    }
}
