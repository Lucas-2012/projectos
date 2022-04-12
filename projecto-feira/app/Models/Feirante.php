<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Feirante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'pais_id',
        'provincia_id',
        'email',
        'telefone',
        'foto-feirante'
    ];

     //Relação com user
     public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacionamento com a feira
    public function feiras(){
        return $this->belongsToMany(Feira::class, 'feira_feirantes')->withTimestamps();
    }

    //Relacionamento com pais
    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    //Relacionamento com a Provincia
    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

    //VALIDAÇÃO DOS DADOS DO FORMULÁRIO
    public function validar(Request $request)
    {
        return $validate = Validator::make($request->all(),[
            'telefone' => 'required|int|max:13|min:9|unique:feirantes',
            'proutos'  => 'required|string',
            'name'     =>  'required|string|min:10|max:30',
            'email'    =>  'required|email|unique:users',
            'preco'    =>  'pdf|max:1MB'
        ]);
    }

    public function provincias($id)
    {
        $provincias = Provincia::find($id)->first();
        return $provincias->descricao;
    }
}
