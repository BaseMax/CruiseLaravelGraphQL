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
        Schema::create('car_issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("car_id");
            $table->unsignedBigInteger("reported_by");
            $table->text("description");
            $table->enum("status", ["reported", "in_progress", "resolved"]);
            $table->timestamps();

            $table->foreign("car_id")->references("id")->on("cars")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("reported_by")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_issues');
    }
};
