<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Mercado extends Model
{
    use HasFactory;

    protected $fillable = [
        'designacao',
        'data_inicio',
        'data_fim',
        'horario',
        'provincia',
        'endereco',
        'cartaz',
    ];


     //Relação com vendedor
     public function vendedor(){
        return $this->belongsToMany(Vendedor::class, 'vendedor_mercados');
    }

    //FUNÇÃO DE VALIDAÇÃO DE CAMPOS
    public function validar(Request $request)
    {

        return $valida = Validator::make($request->all(),[
            'designacao'  => 'required|string|min:10|max:30|unique:mercados',
            'data_inicio' => 'required|date',
            'data_fim'    => 'required|date|after:data_inicio',
            'cartaz'      => 'required|img|jpg|png',
            'horario'     => 'required|time',
            'provincia'   => 'required|string|min:3|max:15',
            'endereco'    => 'required|string',
        ]);

    }


    public function validarDatas(Request $request)
    {

        $data = $request->data_fim;

        if($request->data_inicio >= $data){
            return false;
        }

        return true;

    }
}
