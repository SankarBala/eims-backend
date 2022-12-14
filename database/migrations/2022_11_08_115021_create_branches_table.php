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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('code', 50)->unique()->nullable();
            $table->string('eiin', 10)->default(0);
            $table->string('address')->nullable();
            $table->string('phones')->nullable();
            $table->string('email', 100)->nullable();
            $table->enum('status', ['planned', 'registered', 'postponed', 'running'])->default('running');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
