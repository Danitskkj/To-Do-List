<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->text('descricao')->nullable();
        $table->boolean('concluida')->default(false);
        $table->foreignId('lista_id')->constrained('listas')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
