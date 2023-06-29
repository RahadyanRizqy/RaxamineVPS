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
        Schema::create('cores', function (Blueprint $table) {
            $table->id();
            $table->integer("core_label_qty");
            $table->integer("core_stock_qty")->nullable();
            $table->integer("core_sold_qty")->nullable();
            $table->integer("core_price")->nullable();
            $table->unsignedBigInteger("cpu_fk");

            $table->foreign("cpu_fk")
                ->references("id")
                ->on("cpus")
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cores');
    }
};
