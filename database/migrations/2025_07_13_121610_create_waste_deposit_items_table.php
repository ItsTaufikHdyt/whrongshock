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
        Schema::create('waste_deposit_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('waste_deposit_id')->index();
            $table->unsignedBigInteger('waste_item_id')->index();
            $table->bigInteger('quantity');
            $table->bigInteger('subtotal');
            $table->timestamps();
            $table->foreign('waste_deposit_id')
                ->references('id')
                ->on('waste_deposits')
                ->onDelete('cascade');
            $table->foreign('waste_item_id')
                ->references('id')
                ->on('waste_items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_deposit_items');
    }
};
