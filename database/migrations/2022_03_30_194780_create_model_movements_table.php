<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('deleted_at')->nullable();
            $table->bigInteger('id_type')->unsigned();
            $table->decimal('value',10,2)->unsigned();
            $table->text('observation');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_admin')->unsigned();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_admin')->references('id')->on('users');
            $table->foreign('id_type')->references('id')->on('types_movement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}
