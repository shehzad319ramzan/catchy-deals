<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->UUID('id')->primary();

            $table->string('title');
            $table->string('asin')->nullable();
            $table->string('ean')->nullable();
            $table->text('product_url')->nullable();
            $table->text('img_url')->nullable();
            $table->text('description')->nullable();
            $table->decimal('current_price', 10, 2)->nullable();
            $table->decimal('old_price', 10, 2)->nullable();
            $table->decimal('de_price', 10, 2)->nullable();
            $table->decimal('es_price', 10, 2)->nullable();
            $table->decimal('fr_price', 10, 2)->nullable();
            $table->decimal('it_price', 10, 2)->nullable();
            $table->timestamp('posted_at')->nullable();
            $table->string('status')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
