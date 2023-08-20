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
        Schema::create('maintenanceLogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("car_id");
            $table->date("log_date");
            $table->text("description");
            $table->timestamps();

            $table->foreign("car_id")->references("id")->on("cars")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_logs');
    }
};
