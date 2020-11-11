<?php

namespace Domains\Task\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'tarefa';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'descricao', 'usuario_id'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = true;
}
