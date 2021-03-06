<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userentidad()
    {
        return $this->belongsTo('App\UserEntidad');
    }
    public function getEntidadId()
    {
        $usuario_entidad = DB::table('user_entidades')->where('user_id',$this->id)->first();
        if($usuario_entidad)
        {
            return $usuario_entidad->entidad_id;
        }
        return null;
    }

    // public function roles(){
    //     return $this->belongsToMany('App\Rol', 'user_roles');
    // }

    // public function isAdmin(){
    //     $role = DB::table('user_roles')->where('user_id',$this->id)->where('rol_id',1)->first();
    //     return $role?true:false;
    // }
}
