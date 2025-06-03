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
   Schema::create('tenants', function (Blueprint $table) {
    $table->id(); // Automatically creates an unsignedBigInteger primary key
    $table->string('full_name', 100);
    $table->string('phone', 20)->nullable();
    $table->string('email', 100)->nullable();
    $table->string('id_number', 50)->nullable();
    $table->unsignedBigInteger('room_id')->nullable(); // Ensure it's unsigned
    $table->date('lease_start')->nullable();
    $table->date('lease_end')->nullable();
    $table->timestamp('created_at')->useCurrent();
    $table->timestamp('updated_at')->useCurrent();

    // Foreign key constraint
    $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
});


}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
