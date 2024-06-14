<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    use HasFactory;


    // public function f_a_q_questions(){
    //     return $this->hasMany('App\Models\FAQQuestion');
    // }

    public function f_a_q_questions()
{
    return $this->hasMany(FAQQuestion::class, 'f_a_q_categorie_id');
}



}
