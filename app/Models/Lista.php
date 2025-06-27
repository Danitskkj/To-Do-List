<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Lista extends Model
{
protected $fillable = ['titulo', 'descricao'];
public function tarefas()
{
return $this->hasMany(Tarefa::class);
}
}
