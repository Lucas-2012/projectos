<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Feira extends Model
{
    use HasFactory;

    protected $fillable = [
        'designacao',
        'data_inicio',
        'data_fim',
        'horario',
        'provincia',
        'enedereco',
    ];
    


    //Relação com feirante
    public function feirantes(){
        return $this->belongsToMany(Feirante::class, 'feira_feirantes')->withTimestamps();
    }

    public function validar(Request $request)
    {

        return $valida = validator::make($request->all(),[
            'nome_feira' => 'required|string|main:10|max:30',
            'data_inicio' => 'required|date',
            'data_fim'    => 'required|date|after:data_inicio',
            'cartaz'      => 'required|file|jpg|png',
            'horario'     => 'required|time',
            'provincia'   => 'required|string|min:3|max:15',
            'enedereco'   => 'required|string|min:10|max:20',
        ]);

    }

    public function validarData(Request $request)
    {

        $data = $request->data_fim;

        if($request->data_inicio >= $data){
            return false;
        }

        return true;

    }

   
}
