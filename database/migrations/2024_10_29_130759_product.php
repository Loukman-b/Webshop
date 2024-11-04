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
        Schema::create("Product", function (Blueprint $table) {
            $table->id("Product_ID");
            $table->string("name");
            $table->string("merk");
            $table->text("description")->nullable();
            $table->decimal("price",8,2);
            $table->integer("content");
            $table->string("type");
            $table->string("image")->nullable();
            $table->string("scent_similarities")->nullable();
            $table->string ("stock")->default(0);
            $table->unsignedBigInteger('category_id');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
