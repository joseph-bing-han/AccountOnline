<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('value', 65, 2)->default('0.00');
            $table->enum('type',array('income','expenditure'))->default('income');
            $table->enum('with',array('cash','bank'))->default('cash');
            $table->bigInteger('card_id')->nullable();
            $table->uuid('family_id');  //families table primary id
            $table->unsignedInteger('created_by'); // creat user id
            $table->unsignedInteger('updated_by'); // modify user id
            $table->timestamps();
            $table->tinyInteger('delete')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
