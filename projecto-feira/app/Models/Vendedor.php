<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Vendedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'pais_id',
        'provincias_id',
        'telefone',
        'produtos'
    ];


     //Relação com user
     public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacionamento com Mercado
    public function mercados()
    {
        return $this->belongsToMany(Mercado::class, 'vendedor_mercados');
    }

    //Relacionamento com pais
    public function pais(){
        return $this->hasOne(Pais::class);
    }

    //Relacionamento com a Provincia
    public function provincia(){
        return $this->hasOne(Provincia::class);
    }

      //VALIDAÇÃO DOS DADOS DO FORMULÁRIO
      public function validar(Request $request)
      {
        return $validate = Validator::make($request->all(),[
            'telefone' =>  'required|int|max:13|min:9|unique:vendedors',
            'proutos'  =>  'required|string',
            'name'     =>  'required|string|min:10|max:30',
            'email'    =>  'required|email|unique:users',
            'password' =>  'required|min:6|max:10'
        ]);
      }

      //RETORNA UMA DETERMINADA PROVÍNCIA
      public function provincias($id){
        $provincias = Provincia::find($id)->first();
        return $provincias->descricao;
      }
}
