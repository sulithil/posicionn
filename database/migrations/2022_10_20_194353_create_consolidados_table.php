<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consolidados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('amount', 8, 2)->default(0);
            $table->enum('status',['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->string('tipo');
            $table->string('month');
            $table->string('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consolidados');
    }
};
