<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->bigInteger('amount');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // pending, approved, rejected
            $table->date('withdrawal_date');
            $table->date('requested_date')->nullable();
            $table->date('processed_date')->nullable(); // Date when the withdrawal was processed
            $table->text('note')->nullable(); // Reason for rejection or notes
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
