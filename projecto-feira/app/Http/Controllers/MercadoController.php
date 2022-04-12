<?php

namespace App\Http\Controllers;

use App\Models\Mercado;
use App\Models\Provincia;
use Illuminate\Http\Request;

class MercadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$mercados = Mercado::all();
        return view('admin.mercado.gestao_mercado',[
            'mercados' => Mercado::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mercado.form_cadastro_mercado',['provincias' => Provincia::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mercado = new Mercado();
        
        if($mercado->validar($request))
        {
            if(!($mercado->validarDatas($request)))
            {
                return redirect()->route('mercado.todos')->withInput()->withErrors(['A data de inicio não pode ser maior que a data de término!!']);
            }
            //tratamento do cartaz (IMAGEM)
            if($request->hasFile('cartaz'))
            {
                $file = $request->file('cartaz');
                $filename = md5(time().'.'.$file->getClientOriginalExtension());
                $file->move(public_path('fotos/mercado'), $filename); 
                
                //ADICIONANDO OS DADOS NOS RESPECTIVOS CAMPOS
                $mercado->designacao = $request->nome_mercado;
                $mercado->data_inicio = $request->data_inicio;
                $mercado->data_fim = $request->data_fim;
                $mercado->cartaz_mercado = $filename;

                $mercado->horario = $request->horario;
                $mercado->provincia = $request->provincia;
                $mercado->endereco  = $request->endereco;
                
                $mercado->save(); //GUARDANDO OS DADOS NA BD

                return redirect()->route('mercado.todos')->withErrors([$mercado->designacao.' Cadastrado com  SUCESSO!']);
            } 

        }
        
        return redirect()->back()->withInput()->withErrors(['FALHA AO CADASTRAR']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.mercado.form_editar_mercado',[
            'mercado'      => Mercado::findOrFail($id),
            'provincias'   => Provincia::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mercado = Mercado::findOrFail($id);

        if($mercado->validar($request))
        {
            if(!($mercado->validarDatas($request)))
            {
                return redirect()->route('mercado.todos')->withInput()->withErrors(['A data de inicio não pode ser maior que a data de término!!']);
            }

             //ADICIONANDO OS DADOS NOS RESPECTIVOS CAMPOS
             $mercado->designacao = $request->nome_mercado;
             $mercado->data_inicio = $request->data_inicio;
             $mercado->data_fim = $request->data_fim;
             //$mercado->cartaz_mercado = $filename;

             $mercado->horario = $request->horario;
             $mercado->provincia = $request->provincia;
             $mercado->endereco  = $request->endereco;
             
             $mercado->save(); //GUARDANDO OS DADOS NA BD

             return redirect()->back()->withInput()->withErrors(['Dados actualizado com  SUCESSO!']);
         } 



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->id);
        $mercado = Mercado::findOrFail($request->id);

        $name = $mercado->designacao;
        $mercado->delete();

        return redirect()->route('mercado.todos')->withErrors($name.', foi eliminada com Sucesso!!! ');
    }
}
