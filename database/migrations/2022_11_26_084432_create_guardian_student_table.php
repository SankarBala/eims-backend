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
        Schema::create('guardian_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guardian_id');
            $table->unsignedBigInteger('student_id');
            $table->boolean('can_pick')->default(true);
            $table->unique(['student_id', 'guardian_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurdian_student');
    }
};
