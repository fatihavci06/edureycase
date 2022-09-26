<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitaps',function(Blueprint $table){
    $table->id();
    $table->string('kitap_adi');
    $table->unsignedBigInteger('yazar_id');

    $table->foreign('yazar_id')->references('id')->on('yazars')->onDelete('cascade');
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
        Schema::dropIfExists('kitaps');
    }
}
