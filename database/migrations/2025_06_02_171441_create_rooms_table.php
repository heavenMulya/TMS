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
    Schema::create('rooms', function (Blueprint $table) {
        $table->id(); // INT(11) NOT NULL
        $table->string('room_number', 50); // VARCHAR(50) NOT NULL
        $table->string('type', 50)->nullable(); // VARCHAR(50) DEFAULT NULL
        $table->enum('status', ['vacant', 'occupied', 'maintenance'])->default('vacant'); // ENUM DEFAULT 'vacant'
        $table->decimal('rent_amount', 10, 2)->nullable(); // DECIMAL(10,2) DEFAULT NULL
        $table->timestamp('created_at')->useCurrent(); // DEFAULT CURRENT_TIMESTAMP()
        $table->timestamp('updated_at')->useCurrent(); // DEFAULT CURRENT_TIMESTAMP()
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
