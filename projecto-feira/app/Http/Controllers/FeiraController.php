<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feira;
use App\Models\Provincia;
use Gate;
use Illuminate\Auth\Access\Gate as AccessGate;
use Illuminate\Support\Facades\Gate as FacadesGate;

class FeiraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feiras = Feira::all();//ordBy('designacao', 'desc')->get();
        /*if(FacadesGate::denies('feira.eliminar'))
        {
            return redirect()->route('login')->withErrors(' Sem Permissão');
        }*/
        return view('admin.feira.gestao_feira',[
            'feiras' => $feiras
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.feira.form_cadastro',[
            'provincias' => Provincia::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $feira = new Feira();
        
        if($feira->validar($request)){//VERIFICAÇÃO DOS CAMPOS

            if(!($feira->validarData($request)))
            {
                return redirect()->route('gest_feira')->withInput()->withErrors(['A data de inicio não pode ser maior que a data de término!!']);
            }
           
            //tratamento do cartaz (IMAGEM)
            if($request->hasFile('cartaz') && $request->file('cartaz')->isValid())
            {
                $file = $request->file('cartaz');
                $filename = md5(time().'.'.$file->getClientOriginalExtension());
                
                $file->move(public_path('fotos/feira'), $filename);     
                
                //ADICIONANDO OS DADOS NOS RESPECTIVOS CAMPOS
                $feira->designacao  = $request->nome_feira;
                $feira->data_inicio = $request->data_inicio;
                $feira->data_fim    = $request->data_fim;
                
                $feira->horario     = $request->horario;
                $feira->provincia   = $request->provincia;
                $feira->endereco    = $request->endereco;
                $feira->cartaz_feira = $filename;
                
                $feira->save(); //GUARDANDO OS DADOS NA BD

                return redirect()->route('gest_feira')->withInput()->withErrors(['Cadastrado com  SUCESSO!']);
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
        $feira = Feira::find($id);

        $this->authorize('feira.editar',  $id);

        return view('admin.feira.form_editar_feira',[
            'feira' => $feira
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
        $feira = Feira::find($id);
        $feira->designacao = $request->nome_feira;
        $feira->data_inicio = $request->data_inicio;
        $feira->data_fim = $request->data_fim;
        
        $feira->save(); //GUARDANDO OS DADOS NA BD
        return redirect()->route('gest_feira')->withInput()->withErrors(['actualizado com  SUCESSO!']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $feira = Feira::find($request->id);
        if(Gate::denies('feira.eliminar',  $request->id))
        {
            return redirect()->route('login')->withErrors(' Sem Permissão');
        }
        $name = $feira->designacao;
        $feira->delete();

        return redirect()->route('gest_feira')->withErrors($name.' foi eliminada com Sucesso!!! ');
    }
}
