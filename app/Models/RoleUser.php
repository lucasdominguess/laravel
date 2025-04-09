<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /** @use HasFactory<\Database\Factories\RoleUserFactory> */
    use HasFactory;

    protected $fillable = ['id_user', 'id_role'];
    protected $table = 'role_user';
    protected $hidden = ['created_at', 'updated_at'];

    public function roles()
    {
        return $this->belongsToMany(
            Roles::class,
            'role_user',
            'user_id',
            'role_id'
        );
    }
}
