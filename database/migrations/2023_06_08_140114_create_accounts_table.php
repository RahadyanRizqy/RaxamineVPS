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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->timestamp('registered_at')->nullable();
            $table->unsignedBigInteger("role_fk");
            $table->string("ccnum");
            $table->integer("cvv");
            $table->string("card_expire");
            $table->integer("balance")->nullable();

            $table->foreign("role_fk")
                ->references("id")
                ->on("roles")
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
