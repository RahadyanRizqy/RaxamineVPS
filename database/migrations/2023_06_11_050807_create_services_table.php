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
        Schema::create('services', function (Blueprint $table) {
            // example
            $table->id();
            $table->string("vps_name")->nullable();
            $table->unsignedBigInteger("vps_os"); // Ubuntu 18.04 x86_64
            $table->unsignedBigInteger("vps_version");
            $table->unsignedBigInteger("vps_cpu"); // AMD 2VCPU
            $table->unsignedBigInteger("vps_core");
            $table->unsignedBigInteger("vps_ram"); // 4GB 128GB
            $table->unsignedBigInteger("vps_rom");
            $table->unsignedBigInteger("vps_server"); // ID/SG/US/UK/JP 100/200/300/400/500
            $table->integer("vps_total_price");
            $table->timestamp("created_at")->nullable();
            $table->timestamp("expired_at")->nullable();
            $table->unsignedBigInteger("account_fk");
            $table->timestamp("last_login")->nullable();

            // $table->foreign("vps_os")
            //     ->references("id")
            //     ->on("operating_systems")
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');

            // $table->foreign("vps_version")
            //     ->references("id")
            //     ->on("versions")
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');

            // $table->foreign("vps_cpu")
            //     ->references("id")
            //     ->on("cpu_types")
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
            
            $table->foreign("vps_core")
                ->references("id")
                ->on("cores")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign("vps_ram")
                ->references("id")
                ->on("memories")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign("vps_rom")
                ->references("id")
                ->on("memories")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign("vps_server")
                ->references("id")
                ->on("servers")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign("account_fk")
                ->references("id")
                ->on("accounts")
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
