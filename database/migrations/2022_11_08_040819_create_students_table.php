<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('sid')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->integer('branch_id')->default(0);
            $table->integer('batch_id')->default(0);
            $table->integer('class_id')->default(0);
            $table->integer('group_id')->default(0);
            $table->integer('section_id')->default(0);
            $table->string('password')->default(Hash::make(12345));
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
        Schema::dropIfExists('students');
    }
};
