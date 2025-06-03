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
    Schema::create('payments', function (Blueprint $table) {
        $table->id(); // INT(11) NOT NULL
        $table->unsignedBigInteger('tenant_id')->nullable(); // INT(11) DEFAULT NULL
        $table->decimal('amount', 10, 2)->nullable(); // DECIMAL(10,2) DEFAULT NULL
        $table->date('payment_date')->nullable(); // DATE DEFAULT NULL
        $table->string('month_paid_for', 20)->nullable(); // VARCHAR(20) DEFAULT NULL
        $table->string('method', 50)->nullable(); // VARCHAR(50) DEFAULT NULL
        $table->string('receipt_number', 100)->nullable(); // VARCHAR(100) DEFAULT NULL
        $table->timestamp('created_at')->useCurrent(); // TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        $table->timestamp('updated_at')->useCurrent(); // TIMESTAMP DEFAULT CURRENT_TIMESTAMP

        // Foreign key constraint
        $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('set null');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
