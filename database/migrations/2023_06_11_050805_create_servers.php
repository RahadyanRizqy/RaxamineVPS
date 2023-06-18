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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("location_fk");
            $table->unsignedBigInteger("bandwidth_fk");

            $table->foreign("location_fk")
                ->references("id")
                ->on("locations")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign("bandwidth_fk")
                ->references("id")
                ->on("bandwidths")
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_locations');
    }
};
