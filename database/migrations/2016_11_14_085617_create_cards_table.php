<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('number');
            $table->unsignedInteger('bank_id');
            $table->enum('type', array('debit', 'credit'));
            $table->date('expires')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('owner'); // card owner user id
            $table->uuid('family_id');  //families table primary id
            $table->unsignedInteger('created_by'); // creat user id
            $table->unsignedInteger('updated_by'); // modify user id
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
        Schema::dropIfExists('cards');
    }
}
