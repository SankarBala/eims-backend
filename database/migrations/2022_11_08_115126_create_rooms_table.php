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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId("branch_id")
                ->nullable()
                ->constrained()
                ->onUpdate('cascade');
            $table->foreignId("building_id")
                ->nullable()
                ->constrained()
                ->onUpdate('cascade');
            $table->integer('floor_no')->default(1);
            $table->string('room_number', 10)->nullable();
            $table->string("name")->nullable();
            $table->integer("width")->nullable();
            $table->integer("length")->nullable();
            $table->integer("benches")->nullable();
            $table->integer("seats")->nullable();
            $table->boolean("ready")->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
