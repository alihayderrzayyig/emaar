<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSituationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name')->require();
            $table->string('phone')->require();
            $table->integer('governorate')->require();
            $table->integer('district')->require();
            $table->string('region')->require();
            $table->integer('money')->require();
            $table->bigInteger('achieve')->default(0);
            $table->text('description')->require();
            $table->string('image')->require();
            $table->integer('status')->default(0);
            $table->string('slug')->require()->unique();
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
        Schema::dropIfExists('situations');
    }
}
