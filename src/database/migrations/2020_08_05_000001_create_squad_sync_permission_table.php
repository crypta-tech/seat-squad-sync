<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSquadSyncPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypta_seat_squad_sync_permissions', function (Blueprint $table) {
            $table->unsignedInteger('sync_id');
            $table->unsignedInteger('permission_id');
            $table->primary(['sync_id', 'permission_id']);
            $table->timestamps();

            $table->foreign('sync_id')
                ->references('id')
                ->on('crypta_seat_squad_sync')
                ->onDelete('cascade');

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
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
        Schema::dropIfExists('crypta_seat_squad_sync_permissions');
    }
}
