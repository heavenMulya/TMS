<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('expenses_list', function (Blueprint $table) {
        $table->integer('id')->nullable(); // INT(11) DEFAULT NULL
        $table->string('name', 255);       // VARCHAR(255) NOT NULL
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses_list');
    }
};
