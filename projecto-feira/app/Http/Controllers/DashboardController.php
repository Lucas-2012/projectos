<?php

namespace App\Http\Controllers;

use App\Models\Feira;
use App\Models\FeiraFeirante;
use App\Models\Feirante;
use App\Models\Mercado;
use App\Models\Pais;
use App\Models\Produto;
use App\Models\Provincia;
use App\Models\User;
use App\Models\Vendedor;
use App\Models\Visitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Gate;

class DashboardController extends Controller
{
    
    // DASHBOARD ADMINISTRATIVA
    function index_admin() {

        //Restrição para o Agente gostar a sua PUBLICAÇÃO
        if(Gate::denies('dashboard', User::all()))
        {
            return redirect()->route('/56');
        } 

        return view('admin.dashboard', [
            'qtdFeira'      => Feira::     count(),
            'qtdFeirante'   => Feirante::  count(),
            'qtdMercado'    => Mercado::   count(),
            'qtdVendedor'   => Vendedor::  count(),
            'qtdVisitante'  => Visitante:: count()
        ]);
    }

    public function feiras()
    {
        $feiras = DB::table('feiras')->orderByDesc('feiras.id')->get();
        
        if(Auth::check()){
            $feirantes = Feirante::where('user_id', Auth::user()->id)->first();
            // DB::table('feiras')
            //                 ->join('feira_feirantes', 'feiras.id', 'feira_feirantes.feira_id')
            //                 ->join('feirantes', 'feira_feirantes.feirante_id', 'feirantes.id')
            //                 ->select('feirantes.user_id as user', 'feiras.id as feira')
            //                 // ->where('feirantes.id','feira_feirantes.feirante_id')
            //                 ->where('feirantes.user_id',Auth::user()->id)
            //                 ->orderBy('feira_feirantes.feira_id', 'asc')
            //                 ->get();
            
            return view('front.feiras', [
                'feiras'  => $feiras,
                'infeira' => $feirantes,
            ]);
        }

        return view('front.feiras', [
            'feiras' => $feiras,
            
        ]);
  

    }

   
    public function mercado()
    {
        $mercados = DB::table('mercados')->orderByDesc('mercados.id')->get();
        
        if(Auth::check()){
            $vendedor = DB::table('mercados')
                            ->join('vendedor_mercados', 'mercados.id', 'vendedor_mercados.mercado_id')
                            ->join('vendedors', 'vendedor_mercados.vendedor_id', 'vendedors.id')
                            ->select('vendedors.user_id as user', 'mercados.id as mercado')
                            // ->where('feirantes.id','feira_feirantes.feirante_id')
                            ->where('vendedors.user_id',Auth::user()->id)
                            ->orderBy('vendedor_mercados.mercado_id', 'asc')
                            ->get();
            // dd($vendedor);
            return view('front.mercados', [
                'mercados' => Mercado::all(),
                'vendedor_mercados' =>  $vendedor
            ]);
        }

        return view('front.mercados', [
            'mercados' => $mercados,
        ]);
    }

   
    public function contacto()
    {
        return view('front.contacto');
    }

    
    public function quem_somos()    
    {
        return view('front.quemsomos');
    }

  //Mostra o form de cadastro de FEIRANTE
    public function formFeirante()
    {
        return view('front.feirantes.cadastro_feirante', [
            'paises'     => Pais::all(),
            'provincias' => Provincia::all(),
            'produtos'   => Produto::all()
        ]);
    }
    //Guarda os dados vindo do frormulário FEIRANTE
    public function dadosFeirante(Request $request)
    {
        $feirante  = new Feirante();
        $login     = new User();
        $pais      = new Pais();
        $provincia = new Provincia();

        if($feirante->validar($request))
        {   
            if($request->hasFile('preco'))
            {
                $file = $request->file('preco');
                $filePreco = time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/TabelaPreco/feirante', $filePreco);
            }

            //tratamento da foto de perfil
            if($request->hasFile('foto'))
            {
               
                $file = $request->file('foto');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/fotos/feirante', $filename);
                
                $multivalor = implode(',',$request->input('produtos'));
               
                //atribuição dos dados nos campos da tabela user
                $login->name             = $request->name;
                $login->email            = $request->email;
                $login->tipo             = "feirante";
                $login->foto             = $filename;
                $login->password         = Hash::make($request->password);
                
                //atribuição dos dados nos campos da tabela feirante
                $feirante->produtos     = $multivalor;
                $feirante->telefone     = $request->telefone;
                $feirante->pais_id      = $request->pais;
                $feirante->preco        = $filePreco;
                $feirante->video        = null;
                $feirante->provincias_id = $request->provincia;

                //persistência dos dados na BD
                $login->save();
                $login->feirante()->save($feirante);
                $feirante->save();

                return redirect()->route('login');//volta para a página de login
            }
           
        }
        return redirect()->back()->withErrors('Erro: dados preenchidos incorretamente.');
    }
    //Mostra o form de cadastro de VENDEDOR
    public function formVendedor()
    {
        return view('front.vendedor.cadastro_vendedor', [
            'paises'     => Pais::all(),
            'provincias' => Provincia::all(),
            'produtos'   => Produto::all()
        ]);
    }
    //Guarda os dados vindo do frormulário VENDEDOR
    public function dadosVendedor(Request $request)
    {
        $vendedor  = new Vendedor();
        $login     = new User();
        $pais      = new Pais();
        $provincia = new Provincia();

       //dd($vendedor->validar($request));
       if($request->hasFile('preco'))
        {
            $file = $request->file('preco');
            $filePreco = time().'.'.$file->getClientOriginalExtension();
            $file->move('storage/TabelaPreco/vendedor', $filePreco);
        }


        if($vendedor->validar($request))
        {   
            //tratamento da foto (IMAGEM)
            if($request->hasFile('foto'))
            {
                //dd($request->email);
                $file = $request->file('foto');
                $filename = time().'.'.$file->getClientOriginalExtension();
                ///dd($filename);
                $file->move('storage/fotos/vendedor', $filename);
                
                $multivalor = implode(',',$request->input('produtos'));

                //atribuir dados nos campos da tabela vendedor
                $login->name             = $request->name;
                $login->email            = $request->email;
                $login->tipo             = "Vendedor";
                $login->foto             = $filename;
                $login->password         = Hash::make($request->password);

                //atribuir dados nos campos da tabela vendedor
                $vendedor->pais_id      = $request->pais;
                $vendedor->provincias_id = $request->provincia;
                $vendedor->telefone     = $request->telefone;
                $vendedor->preco        = $filePreco;
                $vendedor->video        = null;
                $vendedor->produtos     = $multivalor;

                //persistência dos dados na BD
                $login->save();
                $login->vendedor()->save($vendedor);
                $vendedor->save();

                return redirect()->route('login');
            }
           
        }
        return redirect()->back()->withErrors('Erro: dados preenchidos incorretamente.');
    }
    //Mostra o form de cadastro de VENDEDOR
    public function formVisitante()
    {
        return view('front.visitantes.cadastro_visitante', [
            'paises'     => Pais::all(),
            'provincias' => Provincia::all(),
            'produtos'   => Produto::all()
        ]);
    }
    //Guarda os dados vindo do frormulário VISITANTE
    public function dadosVisitante(Request $request)
    {
        //dd($request->name);
        $validar = validator::make($request->all(), [
            'name'     => 'required|string|min:10|max:30',
            'telefone' => 'required|string|min:9|max:13|unique:visitantes',
            'email'    =>  'required|email|unique:users|min:11|max:30',
            'password' =>  'required|password|min:6|max:10'
        ]);

        if($request->password != $request->confirm_password)
            return redirect()->route('form.visitante')->withErrors('Palavras passe diferentes!!');

        $visitante = new Visitante();
        $user      = new User();

        $user->name               = $request->name;
        $user->email              = $request->email;
        $user->password           = Hash::make($request->password);
        $user->tipo               = "Visitante";

        $visitante->telefone      = $request->telefone;
        $visitante->provincias_id = $request->provincia;  

        $user->     save();
        $user->     visitante()->save($visitante);
        $visitante->save();

        return redirect()->route('login');
    }

    //se inscrever na feira 
    public function inscreverNaFeira($idFeira)
    {   
        // $feira_feirante = new FeiraFeirante();
        
        $feira = Feira::findOrFail($idFeira);
        $feirante = Feirante::where('user_id', Auth::user()->id)->first();
        
        $feirante->feiras()->attach($feira->id);

        // $feira_feirante->feira_id = $feira->id;
        // $feira_feirante->feirante_id = $feirante->id;
        // $feira_feirante->save();
        // dd($feirante);

        
        $expositores = DB::table('feirantes')
                          ->join('feira_feirantes', 'feirantes.id', 'feira_feirantes.feirante_id')
                          ->join('users', 'feirantes.user_id', 'users.id')
                          ->join('feiras', 'feira_feirantes.feira_id', 'feiras.id')
                          ->where('feiras.id', $idFeira)->get();
        // dd($expositores);
        return view('front.feirantes.listar_feirantes', [
            'feirantes' => $expositores
        ]);
    }

    //se inscrever no mercado
    public function inscreverNoMercado($idMercado)
    {
        $mercado = Mercado::findOrFail($idMercado)->first();
        $user    = Vendedor::where('user_id', Auth::user()->id)->first();
        $vendedor = Vendedor::find($user->id)->mercado()->attach($mercado);

        $vendedores = DB::table('vendedors')
                            ->join('vendedor_mercados', 'vendedors.id', 'vendedor_mercados.vendedor_id')
                            ->join('users', 'vendedors.user_id', 'users.id')
                            ->join('mercados', 'vendedor_mercados.mercado_id', 'mercados.id')
                            ->where('mercados.id', $idMercado)->get();
        //dd($vendedores);
        
        return view('front.vendedor.listar_vendedor', [
            'vendedores' => $vendedores
        ]);
    
    }

    //ver perfil do feirante
    public function perfilFeirante()
    {
        return view('perfil.perfilFeirante');
    }

    //enviar email
    public function contacteNos(Request $request)
    {
        dd($request);
    }
    


}
