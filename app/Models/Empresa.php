<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /** @use HasFactory<\Database\Factories\EmpresaFactory> */
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'empresas';

    protected $hidden = ['created_at', 'updated_at'];
    public function aniversariantes()
    {
        return $this->hasMany(Aniversariante::class, 'id_empresa');
    }
}
