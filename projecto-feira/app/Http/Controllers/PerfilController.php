<?php

namespace App\Http\Controllers;

use App\Models\Feirante;
use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{

    public function verPerfilFeirante($id){

        $feirante = Feirante::where('user_id', $id)->first();

        $visitas = Feirante::where('user_id', $id)->increment('visitas');
        
        

        return view('perfil.perfilFeirante', [
            'feirante' => $feirante
        ]);
    }
    public function verPerfilVendedor($id){
        
        $vendedor = DB::table('vendedors')
                    ->join   ('users', 'users.id', 'vendedors.user_id')
                    ->join   ('provincias', 'vendedors.provincias_id', 'provincias.id')
                    ->where  ('vendedors.id', $id)->first();
                    // dd($vendedor);
        $visitas = Vendedor::where('id', $id)->increment('visitas');
        
        return view('perfil.perfilVendedor', [
            'vendedor' => $vendedor
        ]);
    }

    //Adicionar Video
    public function addVideoFeirante(Request $request, $idFeirante)
    {
        $feirante = Feirante::findOrFail($idFeirante)->first();

        $feirante->video = $request->video;
        $feirante->save();

        return redirect()->back()->withErrors('Video adicionado com Sucesso!!');
    }
    //Adicionar Video
    public function addVideoVendedor(Request $request, $idVendedor)
    {
        $vendedor = Vendedor::findOrFail($idVendedor)->first();

        $vendedor->video = $request->video;
        $vendedor->save();

        return redirect()->back()->withErrors('Video adicionado com Sucesso!!');
    }

    /******************************
     * PERFIL DOS UTILIZADORES
     * ****************************/

     //PERFIL DO FEIRANTE
    public function perfil_F($id){

        
        // dd($feirante->user->name);

        return view('perfil.perfilUser_F', [
            'feirante' => Feirante::where('user_id', $id)->first()
        ]);
    }

    //PERFIL DO VENDEDOR
    public function perfil_V($id){
        
        // dd($id);

        return view('perfil.perfilUser_V', [
            'vendedor' => Vendedor::where('user_id', $id)->first()
        ]);
    }

    //PERFIL DO ADMIN
    public function perfil_Admin(){
        
        // dd($id);

        return view('admin.perfilAdmin', [
            'admin' => User::where('id', Auth::user()->id)->Where('tipo', 'Admin')->first()
        ]);
    }


    /*******************************
     * EDITAR PERFIL
     * *****************************/

     //EDITAR PERFIL DO FEIRANTE
     public function editarPerfil_F(Request $request)
     {
         $feirante = Feirante::find($request->idFeirante)->first();

        $user = User::where('id', $feirante->user_id)->first();

        if(!empty($request->password)){
            if($request->password != $request->confirmar){
                return redirect()->withErrors('Password diferente da confirmação');
            }
            $user->password = Hash::make($request->password);
        }

        if(!empty($request->preco)){
            if(!$request->hasFile('preco'))
            {
                $file = $request->file('preco');
                $filePreco = time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/TabelaPreco/feirante', $filePreco);
                $feirante->preco        = $filePreco;
            }
        }

        $feirante->telefone = $request->telefone;
        
        $user->name = $request->name;
        $user->email = $request->email;

        $feirante->save();
        $user->save();
        return redirect()->back()->withErrors('Dados actualizado com SUCESSO!!!');

     }

     //EDITAR PERFIL DO VENDEDOR
     public function editarPerfil_V(Request $request)
     {
         $vendedor = Vendedor::find($request->idVendedor)->first();

        $user = User::where('id', $vendedor->user_id)->first();

        if(!empty($request->password)){
            if($request->password != $request->confirmar){
                return redirect()->withErrors('Password diferente da confirmação');
            }
            $user->password = Hash::make($request->password);
        }

        if(!empty($request->preco)){
            if(!$request->hasFile('preco'))
            {
                $file = $request->file('preco');
                $filePreco = time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/TabelaPreco/feirante', $filePreco);
                $vendedor->preco        = $filePreco;
            }
        }

        $vendedor->telefone = $request->telefone;
        
        $user->name = $request->name;
        $user->email = $request->email;

        $vendedor->save();
        $user->save();
        return redirect()->back()->withErrors('Dados actualizado com SUCESSO!!!');

     }

     //EDITAR PERFIL DO ADMIN
     public function editarPerfl_Admin(Request $request)
     {
        $user = User::where('id', Auth::user()->id)->where('tipo', 'Admin')->first();

        if(!empty($request->password)){
            if($request->password != $request->confirmar){
                return redirect()->withErrors('Password diferente da confirmação');
            }
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->back()->withErrors('Dados actualizado com SUCESSO!!!');
     }


    
}
