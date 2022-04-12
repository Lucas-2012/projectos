<?php

use App\Http\Controllers\FeiraController;
use App\Http\Controllers\FeiranteController;
use App\Http\Controllers\MercadoController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\VisitanteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*******************************
 *   ROTAS DO FRONT
 *******************************/
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard.front');

Route::any('front/ver/1/feiras',                      [DashboardController::class, 'feiras'            ])->name('dashboard.feiras'   );
Route::any('front/ver/2/mercados',                    [DashboardController::class, 'mercado'           ])->name('dashboard.mercados' );
Route::any('front/contacto/',                         [DashboardController::class, 'contacto'          ])->name('dashboard.contacto' );
Route::any('front/enviar/mensagem',                   [DashboardController::class, 'contacteNos'       ])->name('dashboard.enviar_contacto' );
Route::any('front/quem-somos/',                       [DashboardController::class, 'quem_somos'        ])->name('dashboard.quemsomos');
Route::any('front//home',                             [DashboardController::class, 'index'             ])->name('feiras'             );
Route::any('front/form/feirante/',                    [DashboardController::class, 'formFeirante'      ])->name('feirante.form'      );
Route::any('front/guarda/dados/5/feirante/7/',        [DashboardController::class, 'dadosFeirante'     ])->name('guarda.feirante'    );
Route::any('front//form/cadastro/vendedor',           [DashboardController::class, 'formVendedor'      ])->name('form.vendedor'      );
Route::any('front//guarda/dados/vendedor/4/',         [DashboardController::class, 'dadosVendedor'     ])->name('guarda.vendedor'    );
Route::any('front//form/cadastro/visitante/',         [DashboardController::class, 'formVisitante'     ])->name('form.visitante'     );
Route::any('front//form/guada/dados/visitante/',      [DashboardController::class, 'dadosVisitante'    ])->name('guarda.visitante'  );
Route::any('front/inscrever/na/{idFeira}/feira/',     [DashboardController::class, 'inscreverNaFeira'  ])->middleware('auth')->name('inscrever.feira');
Route::any('front/inscrever/no/{idMercado}/mercado/', [DashboardController::class, 'inscreverNoMercado'])->middleware('auth')->name('inscrever.mercado');
Route::any('expositor/listar-todos/{id}/',            [FeiranteController::class,  'todosExpositor'    ])->middleware('auth')->name('todos.expositores');
Route::any('front/vendedor/listar-todos/{id}/',       [VendedorController::class,  'todosVendedores'   ])->middleware('auth')->name('todos.vendedores');
Route::any('front/feirante/ver/{id}/perfil/',         [PerfilController::class, 'verPerfilFeirante'    ])->middleware('auth')->name('feirante.perfil');
Route::any('front/2/vendedor/{id}/ver/perfil/',       [PerfilController::class, 'verPerfilVendedor'    ])->middleware('auth')->name('vendedor.perfil');
Route::any('front/tabela-de-preco/{id}/ver/feirante/',[PerfilController::class, 'verPrecoFeirante'     ])->middleware('auth')->name('feirante.preco');

/*****************************************************************************************
 * ROTAS DO PERFIL DO UTILIZADOR, ONDE PODERÁ FAZER A EDIÇÃO DOS DADOS
 *****************************************************************************************/
Route::any('feirante/4/perfil/{id}/user_f',            [PerfilController::class, 'perfil_F'] )->middleware('auth')->name('perfil.userF');
Route::any('vendedor/2/perfil/{id}/user_v',          [PerfilController::class,   'perfil_V' ])->middleware('auth')->name('perfil.userV');
Route::any('feirante/2/editar//perfil',          [PerfilController::class,   'editarPerfil_F' ])->middleware('auth')->name('editarPerfil.feirante');
Route::any('4-vendedor/9/editar//perfil',          [PerfilController::class,   'editarPerfil_V' ])->middleware('auth')->name('editarPerfil.vendedor');



/**********************************************
 *   FIM DAS ROTAS DO FRONT
 **********************************************/


 /*************************************************
  *         ROTAS ADMINISTRATIVAS
  ************************************************/
  
  Route::prefix('restritito')->group(function () {
    
    Route::get('/', function () {
       return view('auth.login');
    })->name('login');


    /*---------------------------------DashBoard Administrativo--------------------------------------------*/
    Route::any('/dashboard', [DashboardController::class, 'index_admin'])->middleware(['auth'])->name('dashboard');
    /*---------------------------------DFIM ashBoard Administrativo--------------------------------------------*/


    /*---------------- ROTAS - FEIRA ---------------------------------*/
    Route::get('gerir/1/feira/',                    [FeiraController::class, 'index']  )->middleware('auth')->name('gest_feira');
    Route::get('feira/form/1/cadastro',             [FeiraController::class, 'create'] )->middleware('auth')->name('feira.form.cad');
    Route::any('feira/guardar/1/dados',             [FeiraController::class, 'store']  )->middleware('auth')->name('feira.guardar');
    Route::any('feira/eliminar/1/dados',            [FeiraController::class, 'destroy'])->middleware('auth')->name('feira.eliminar');
    Route::any('feira/{id}/form/1/editar',          [FeiraController::class, 'edit']   )->middleware('auth')->name('feira.editar');
    Route::any('feira/update/1/{id}/guardar-dados', [FeiraController::class, 'update'] )->middleware('auth')->name('feira.update');
    
    /*-----------------------------FIM ROTAS - FEIRA--------------------------------------------------*/

    /*-------------------------------ROTAS - FEIRANTE-------------------------------------*/
    Route::get('gerir/2/feirante',                     [FeiranteController::class, 'index']  )->middleware('auth')->name('feirante.todos');
    Route::get('feirante/2/form/cadastro',             [FeiranteController::class, 'create'] )->name('feirante.form.cad');
    Route::any('feirante/2/guardar/dados',             [FeiranteController::class, 'store']  )->name('feirante.guardar');
    Route::any('feirante/3/eliminar/dados',            [FeiranteController::class, 'destroy'])->middleware('auth')->name('feirante.eliminar');
    Route::any('feirante/4/{id}/editar/dados',         [FeiranteController::class, 'edit']   )->middleware('auth')->name('feirante.editar');
    Route::any('feirante/4/editar/{id}/guardar-dados', [FeiranteController::class, 'update'] )->middleware('auth')->name('feirante.update');
    Route::any('feirante/4/add/{id}/video',            [PerfilController::class, 'addVideoFeirante'] )->middleware('auth')->name('add.video');
    
    /*-----------------------------FIM ROTAS - FEIRANTE----------------------------------*/

    /*-------------------------------ROTAS - MERCADO-------------------------------------*/
    Route::get('gerir/3/mercado',            [MercadoController::class, 'index'  ])->middleware('auth')->name('mercado.todos'   );
    Route::get('/3/form/cadastrar/mercado',  [MercadoController::class, 'create' ])->middleware('auth')->name('mercado.form.cad');
    Route::any('/3/form/guardar/dados',      [MercadoController::class, 'store'  ])->middleware('auth')->name('mercado.guardar' );
    Route::any('/edit/form/mercado/{id}',    [MercadoController::class, 'edit'   ])->middleware('auth')->name('mercado.editar'  );
    Route::any('/update/dados/{id}/mercado', [MercadoController::class, 'update' ])->middleware('auth')->name('mercado.update'  );
    Route::any('/eliminar/dados/mercado/',   [MercadoController::class, 'destroy'])->middleware('auth')->name('mercado.eliminar');
    /*-----------------------------FIM ROTAS - MERCADO----------------------------------*/

    /*-------------------------------ROTAS - VENDEDOR-------------------------------------*/
    Route::get('gerir/4/vendedor',                     [VendedorController::class, 'index'          ])->middleware('auth')->name('vendedor.todos'   );
    Route::get('/4/form/cadastrar/vendedor',           [VendedorController::class, 'create'         ])->middleware('auth')->name('vendedor.form.cad');
    Route::any('/4/form/guardar/dados',                [VendedorController::class, 'store'          ])->middleware('auth')->name('vendedor.guardar' );
    Route::any('vendedor/3/eliminar/dados',            [VendedorController::class, 'destroy'        ])->middleware('auth')->name('vendedor.eliminar');
    Route::any('vendedor/4/{id}/editar/dados',         [VendedorController::class, 'edit'           ])->middleware('auth')->name('vendedor.editar'  );
    Route::any('vendedor/4/editar/{id}/guardar-dados', [VendedorController::class, 'update'         ])->middleware('auth')->name('vendedor.update'  );
    Route::any('vendedor/2/add/{id}/video',            [PerfilController::class,   'addVideoVendedor'])->middleware('auth')->name('add.videoV');
    /*-----------------------------FIM ROTAS - VENDEDOR----------------------------------*/

    /*-------------------------------ROTAS - VISITANTE----------------------------------------------------------------------------------*/
    Route::any('gerir/5/visitante',           [VisitanteController::class, 'index'  ])->middleware('auth' )->name('visitante.todos'     );
    Route::any('/5/form/editar/visitante',    [VisitanteController::class, 'edit'   ])->middleware('auth'   )->name('visitante.editar');
    Route::any('/5/form/guardar/dados',       [VisitanteController::class, 'update' ])->middleware('auth')->name('visitante.guardar'    );
    /*-----------------------------FIM ROTAS - VISITANTE--------------------------------------------------------------------------------*/

    /*-------------------------------ROTAS - CATEGORIA------------------------------------------------------------------------------*/
    Route::any('gerir/categoria-de-produto/', [ProdutoController::class, 'index' ])->middleware('auth')->name('categoria.todas'   );
    Route::any('/0/form/cadastrar/categoria', [ProdutoController::class, 'create'])->middleware('auth')->name('categoria.form.cad');
    Route::any('/0/form/guardar/dados',       [ProdutoController::class, 'store' ])->middleware('auth')->name('categoria.guardar' );
    /*------------------------------FIM ROTAS - CATEGORIA---------------------------------------------------------------------------*/

    Route::any('perfil-admin/ver/', [PerfilController::class, 'perfil_Admin'])->middleware('auth')->name('perfil.admin');
    Route::any('perfil-admin/editar/', [PerfilController::class, 'editarPerfl_Admin'])->middleware('auth')->name('editarPerfil.admin');

});


/*******************
 * Rotas do vo
 */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



require __DIR__.'/auth.php';
