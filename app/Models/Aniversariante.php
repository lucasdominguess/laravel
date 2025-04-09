<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aniversariante extends Model
{
    /** @use HasFactory<\Database\Factories\AniversarianteFactory> */
    use HasFactory , SoftDeletes;

    protected $table = 'aniversariantes'; // Garante que Laravel reconheça a tabela correta

    protected $fillable = ['nome', 'email', 'data_nascimento', 'id_empresa'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    // protected $dates = ['data_nascimento']; // Se você quiser que o Laravel trate isso como uma data

    protected $casts = [
        //'data_nascimento' => 'date', // Converte automaticamente para objeto de data
    ];

    /**
     * Relacionamento: um aniversariante pertence a uma empresa.
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}
