<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSquadSyncTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypta_seat_squad_sync', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('squad_id');
            $table->unsignedInteger('role_id');
            $table->string('name');
            // $table->json('permissions');
            $table->timestamps();

            $table->foreign('squad_id')
                ->references('id')
                ->on('squads')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->unique(['squad_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crypta_seat_squad_sync');
    }
}
