<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Visitante extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'provincia_id',
        'email',
        'telefone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacionamento com a Provincia
    public function provincia(){
        return $this->hasOne(Provincia::class);
    }
}
