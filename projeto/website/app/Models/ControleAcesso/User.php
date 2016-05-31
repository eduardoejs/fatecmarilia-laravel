<?php

namespace App\Models\ControleAcesso;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'plainPassword',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'plainPassword',
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
    public function notasRapidas()
    {
        return $this->hasMany(\App\Models\FastNote::class);
    }
    
    public function vagasEstagios()
    {
        return $this->hasMany(\App\Models\Estagios\EmpresaEstagio::class);
    }
    
    public function logs(){
        return $this->hasMany(\App\Models\Log::class);
    }
    
    public function agendamentos()
    {
        return $this->hasMany(\App\Models\Agenda\Agendamento::class);
    }
    
    public function noticias()
    {
        return $this->hasMany(\App\Models\Noticias\Noticia::class);
    }
    
    public function paginas()
    {
        return $this->hasMany(\App\Models\Paginas\Pagina::class);
    }
    
    public function docentes()
    {
        return $this->hasMany(\App\Models\Academico\Docente::class);
    }

    public function addRole($role)
    {  
        if (is_string($role)) {
            return $this->roles()->save(
                Role::whereName($role)->firstOrFail()
            );
        }
 
        return $this->roles()->save(
            Role::whereName($role->name)->firstOrFail()
        );
    }

    public function revokeRole($role)
    {
        if (is_string($role)) {
            return $this->roles()->detach(
                Role::whereName($role)->firstOrFail()
            );
        }

        return $this->roles()->detach($role);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

//        if(is_array($role)) {
//            foreach($role as $r) {
//                if($this->roles->contains('name', $r)) {
//                    return true;
//                }
//            }
//            return false;
//        }

        return $role->intersect($this->roles)->count();
    }

    public function getPlainPassword(){
        return $this->plainPassword;
    }

    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }
}
