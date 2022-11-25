<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('bedrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone_bedroom')->nullable();
            $table->decimal('price', 5, 2)->nullable();
            $table->string('image')->nullable();
            $table->foreignId('bedroom_type_id')->constrained();
            $table->foreignId('hotel_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bedrooms');
    }
}
