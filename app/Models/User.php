<?php

namespace App\Models;

use App\Models\Movimentacao;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    protected $table = 'users';

    protected $appends  = ['is_admin'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'login',
        'password',
        'id_profile',
        'id_admin',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'isAdmin' => 'boolean',
    ];

    public function getIsAdminAttribute()
    {
        return ($this->id_profile == 1) ? true : false;
    }

    public function perfil()
    {
        return $this->hasOne(Profile::class, 'id', 'id_profile');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'id_admin');
    }

    public function getMovimentacoesAttribute()
    {
        return Movement::with('type_movement')->where('id_user',$this->id)->get();
    }


}
