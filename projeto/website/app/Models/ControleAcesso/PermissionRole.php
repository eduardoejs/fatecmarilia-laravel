<?php

namespace App\Models\ControleAcesso;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $fillable = ['role_id', 'permission_id'];
}
