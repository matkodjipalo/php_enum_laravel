<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('initiator_id')->unsigned();
            $table->integer('receiver_id')->unsigned();
            $table->enum('status', \App\ConnectionStatusType::getSupportedTypes())
                ->default(\App\ConnectionStatusType::pending()->getName());
            $table->timestamps();

            $table->unique(['initiator_id', 'receiver_id'], 'initiator_id_receiver_id_unique');

            $table->foreign('initiator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('receiver_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connections');
    }
}
