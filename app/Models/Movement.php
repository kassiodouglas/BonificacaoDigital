<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'movements';

    public function type_movement()
    {
        return $this->hasOne(TypesMovement::class, 'id', 'id_type');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'id_admin');
    }



}
