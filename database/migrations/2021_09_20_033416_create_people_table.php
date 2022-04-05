<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('card_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('birth_date');
            $table->string('birth_place');
            $table->string('father_name');
            $table->string('mother_name');
            $table->enum('gender', ['M', 'F']);
            $table->string('address');
            $table->string('phone');
            $table->string('profession');
            $table->text('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
