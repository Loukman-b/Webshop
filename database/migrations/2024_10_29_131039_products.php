<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('Product_ID');
            $table->string('name');
            $table->string('merk');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('content');
            $table->string('type');
            $table->string('image')->nullable();
            $table->string('scent_similarities')->nullable();
            $table->integer('stock')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        
            // Foreign key constraint
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');

        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
