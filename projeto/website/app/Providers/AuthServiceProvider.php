<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\AgendamentoPolicy;

use App\Models\ControleAcesso\Permission;
use App\Models\Agenda\Agendamento;
use App\Models\ControleAcesso\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [        
        Agendamento::class => AgendamentoPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {        
        $this->registerPolicies($gate);
        
        if(!\App::runningInConsole()){
            foreach($this->getPermissions() as $permission) {                
                $gate->define($permission->name, function($user) use($permission) {
                    return $user->hasRole($permission->roles) || $user->isAdmin();
                });
            }
        }
    }
    
    public function getPermissions()
    {        
        return Permission::with('roles')->get();
    }
}
