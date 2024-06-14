<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQQuestion extends Model
{
    use HasFactory;

    // public function f_a_q_categorie(){
    //     return $this->belongsTo('App\Models\FAQCategorie');
    // }

    public function f_a_q_categorie()
{
    return $this->belongsTo(FAQCategory::class, 'f_a_q_categorie_id');
}


}
