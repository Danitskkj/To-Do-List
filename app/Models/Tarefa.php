<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tarefa extends Model
{
protected $fillable = ['titulo', 'descricao',
'concluida', 'lista_id'];
public function lista()
{
return $this->belongsTo(Lista::class);
}
}