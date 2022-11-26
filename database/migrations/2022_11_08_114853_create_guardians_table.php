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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('mobile')->nullable();
            $table->string('nid')->nullable();
            $table->string('password')->default(Hash::make(12345));
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at');
            $table->boolean('can_pick')->default(1);
            $table->boolean('verified')->default(0);
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
        Schema::dropIfExists('guardians');
    }
};
