<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormaPagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forma_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 100);
            $table->bigInteger("tipo_forma_pagamento_id");
            $table->string("foto", 100)->nullable();
            $table->timestamps();
            $table->foreign('tipo_forma_pagamento_id')->references('id')->on('tipo_forma_pagamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forma_pagamentos');
    }
}
