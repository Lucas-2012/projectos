<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Produto;
use App\Models\Provincia;
use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vendedor.gestao_vendedor',[
            'vendedores' => DB::table('vendedors')
                                ->join('users', 'vendedors.user_id', 'users.id')
                                ->join('provincias', 'vendedors.provincias_id', 'provincias.id')
                                ->orderByDesc('vendedors.id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendedor.form_cadastro_vendedor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $vendedor  = new Vendedor();
        $login     = new User();
        $pais      = new Pais();
        $provincia = new Provincia();

        //dd($request->email);
        //dd($feirante->validar($request));

        if($vendedor->validar($request))
        {   
            //tratamento da foto (IMAGEM)
            if($request->hasFile('foto'))
            {
                $file = $request->file('foto');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/fotos/vendedor', $filename);
                
                $multivalor = implode(',',$request->input('produtos'));
                $vendedor->produtos     = $multivalor;
                $vendedor->telefone     = $request->telefone;
                $vendedor->pais_id      = $request->pais;
                $vendedor->provincias_id = $request->provincia;

                $login->name             = $request->name;
                $login->email            = $request->email;
                $login->tipo             = "Vendedor";
                $login->foto             = $filename;
                $login->password         = Hash::make($request->password);
                $login->save();
                $login->vendedor()->save($vendedor);
                $vendedor->save();

                return redirect()->route('vendedor.todos')->withInput()->withErrors(['Cadastrado com  SUCESSO!']);
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
        $vendedor = Vendedor::find($id);
        $user     = User::find($vendedor->user_id);

        $produtos = Produto::all();
        $pais     = Pais::all();
        $provincias = Provincia::all();
        $produts = explode(",",$vendedor->produtos);
        //dd($produts);

        return view('admin.vendedor.form_editar_vdr',[
            'produtos'   => $produtos,
            'paises'     => $pais,
            'provincias' => $provincias,
            'vendedor'   => $vendedor,
            'produts'   => $produts
        ]);
        dd($id);
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
        $vendedor = Vendedor::find($id);
        $login     = User::find($vendedor->user_id);

        //tratamento do foto (IMAGEM)
        if($request->produtos != null)
        {
        //    dd($request->produtos);
            $multivalor = implode(',',$request->input('produtos'));
            $vendedor->produtos     = $multivalor;
        }
        
        $vendedor->telefone      = $request->telefone;
        $vendedor->pais_id       = $request->pais;
        $vendedor->provincias_id = $request->provincia;

        $login->name             = $request->name;
        $login->email            = $request->email;
            
        $login->save();
        $vendedor->save();

        return redirect()->route('vendedor.todos')->withErrors('dados actualizado com Sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //lista todos os vendedores
    public function todosVendedores($id)
    {
        $vendedores = DB::table('vendedors')
                            ->join('vendedor_mercados', 'vendedors.id', 'vendedor_mercados.vendedor_id')
                            ->join('users', 'vendedors.user_id', 'users.id')
                            ->join('mercados', 'vendedor_mercados.mercado_id', 'mercados.id')
                            ->where('mercados.id', $id)->get();
        //dd($vendedores);
        return view('front.vendedor.listar_vendedor', [
            'vendedores' => $vendedores
        ]);
    }
}
