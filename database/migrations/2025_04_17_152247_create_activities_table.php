<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('duration_min')->nullable();
            $table->unsignedInteger('duration_max')->nullable();
            $table->boolean('is_new')->default(false);
            $table->enum('type', ['mental', 'physical', 'both']);
            $table->json('time')->nullable(); // ['day', 'night']
            $table->json('keywords')->nullable(); // ['reading', 'indoor']
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
