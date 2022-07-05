<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->float('price',8,2);
            $table->integer('order');
            $table->boolean('is_active')->default(0);
            $table->timestamps();




            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packs');
    }
}
