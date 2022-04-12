<?php

namespace App\Providers;

use App\Models\Feira;
use App\Models\User;
use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(AccessGate $gate)
    {
        $this->registerPolicies($gate);

        //Autorização para editar as feiras
        $gate->define('feira.editar', function(User $user, $id){
            return strcmp($user->tipo,"Admin") == 0;
        });

        //Autorização para eliminar as feiras
        $gate->define('feira.eliminar', function(User $user, $id){
            return strcmp($user->tipo,"Admin") == 0;
        });

        //Autorização para ver todas as férias
        $gate->define('gest_feira', function(User $user, $id){
            return strcmp($user->tipo,"Admin") == 0;
        });

        //Autorização do Painel admin
        $gate->define('dashboard', function(User $user, $id){
            return strcmp($user->tipo,"Admin") == 0;
        });


    }
}
