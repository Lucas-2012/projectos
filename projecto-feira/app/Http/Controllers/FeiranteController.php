<?php

namespace App\Http\Controllers;

use App\Models\Feira;
use App\Models\Feirante;
use App\Models\Pais;
use App\Models\Produto;
use App\Models\Provincia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FeiranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feiantes = Feirante::all();
        $provincias = Provincia::all();
                           /* ->join('users', 'users.id', '=', 'feirantes.user_id')
                            ->join('pais', 'feirantes.pais_id', '=', 'pais.id')
                            ->join('provincias', 'feirantes.provincias_id', 'provincias.id')->get();//DB::table('feirantes')->paginate(5);*/
       //dd($users);
        return view('admin.feirante.gestao_feirante',[
            'feiantes'       => $feiantes,
            'provincias'  => $provincias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();
        $pais     = Pais::all();
        $provincias = Provincia::all();

        //$feirantes = $feirantes->provincias();

        return view('admin.feirante.form_cadastro_ft',[
            'produtos'  => $produtos,
            'paises'    => $pais,
            'provincias' => $provincias,
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
        
        $feirante  = new Feirante();
        $login     = new User();
        $pais      = new Pais();
        $provincia = new Provincia();

        //dd($request->email);
        //dd($feirante->validar($request));

        if($feirante->validar($request))
        {   
            //tratamento do foto (IMAGEM)
            if($request->hasFile('foto'))
            {
                //dd($request->email);
                $file = $request->file('foto');
                $filename = time().'.'.$file->getClientOriginalExtension();
                ///dd($filename);
                $file->move('storage/fotos/feirante', $filename);
                
                $multivalor = implode(',',$request->input('produtos'));
                $feirante->produtos     = $multivalor;
                $feirante->telefone     = $request->telefone;
                $feirante->pais_id      = $request->pais;
                $feirante->provincias_id = $request->provincia;

                $login->name             = $request->name;
                $login->email            = $request->email;
                $login->tipo             = "feirante";
                $login->foto             = $filename;
                $login->password         = Hash::make('123');
                $login->save();
                $login->feirante()->save($feirante);
                $feirante->save();

                return redirect()->route('feirante.todos')->withErrors('Cadastrado com Sucesso!!!');
            }
           
        }
        return redirect()->back()->withErrors('Erro: dados preenchidos incorretamente.');
        
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
        $feirante = Feirante::find($id);
        $user     = User::find($feirante->user_id);

        $produtos = Produto::all();
        $pais     = Pais::all();
        $provincias = Provincia::all();
        $produts = explode(",",$feirante->produtos);
        //dd($produts);

        return view('admin.feirante.form_editar_ft',[
            'produtos'   => $produtos,
            'paises'     => $pais,
            'provincias' => $provincias,
            'feirante'   => $feirante,
            'produts'   => $produts
        ]);
        //dd($user);
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
        $feirante = Feirante::find($id);
        $login     = User::find($feirante->user_id);

        //tratamento do foto (IMAGEM)
        if($request->produtos != null)
        {
           dd($request->produtos);
            $multivalor = implode(',',$request->input('produtos'));
            $feirante->produtos     = $multivalor;
        }
        
        $feirante->telefone      = $request->telefone;
        $feirante->pais_id       = $request->pais;
        $feirante->provincias_id = $request->provincia;

        $login->name             = $request->name;
        $login->email            = $request->email;
            
        $login->save();
        $feirante->save();

        return redirect()->route('feirante.todos')->withErrors('dados actualizado com Sucesso!!!');
        //dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $feirante = Feirante::find($request->id);
        $user     = User::find($feirante->user_id);

        $name = $user->name;

        $feirante->delete();
        $user->delete();

        
        //dd($user->name);

        return redirect()->route('feirante.todos')->withErrors($name.', foi eliminado(a) com Sucesso!!! ');
    }

    //lista todos os feirantes
    public function todosExpositor($id)
    {   
        // dd($id);
        $expositores = DB::table('feirantes')
                            ->join('feira_feirantes', 'feirantes.id', 'feira_feirantes.feirante_id')
                            ->join('users', 'feirantes.user_id', 'users.id')
                            ->join('feiras', 'feira_feirantes.feira_id', 'feiras.id')
                            ->where('feiras.id', $id)->get();
        //dd($expositores);
        
        return view('front.feirantes.listar_feirantes', [
            'feirantes' => $expositores
        ]);
    }
}
