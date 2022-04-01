<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelMovimentacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->bigInteger('id_tipo')->unsigned();
            $table->decimal('valor',10,2)->unsigned();
            $table->text('observacao');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_admin')->unsigned();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_admin')->references('id')->on('users');
            $table->foreign('id_tipo')->references('id')->on('tipos_movimentacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacoes');
    }
}
