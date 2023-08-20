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
        Schema::create('car_accessories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("car_id");
            $table->string("name");
            $table->text("description");
            $table->decimal("price");
            $table->timestamps();

            $table->foreign("car_id")->references("id")->on("cars")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_accessories');
    }
};
