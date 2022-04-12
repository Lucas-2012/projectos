<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeiraFeirante extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 
        'feira_id', 
        'feirante_id'
    ];

    // public function feira(){
    //     return $this->belongsTo(Feira::class);
    // }
    // public function feirante(){
    //     return $this->belongsTo(Feirante::class);
    // }
}
