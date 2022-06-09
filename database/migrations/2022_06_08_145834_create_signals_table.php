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
        Schema::create('signals', function (Blueprint $table) {
            $table->id();
            $table->string('pair');
            $table->decimal('price', 12, 2);
            $table->string('duration');
            $table->text('description')->nullable();
            $table->string('tp')->nullable();
            $table->string('sl')->nullable();
            $table->enum('move', ['buy', 'sell'])->default('buy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signals');
    }
};
