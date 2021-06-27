<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('serial_number')->unique();
            $table->text('description');
            $table->boolean('fixed');               //asset is movable if false
            $table->string('picture_path'); 
            $table->dateTime('purchase_date');
            $table->dateTime('start_use_date');
            $table->double('purchase_price');
            $table->date('warranty_expiry_date');
            $table->unsignedInteger('degradation');            //degradation in years
            $table->double('current_value');        //current value in naira
            $table->string('location');
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
        Schema::dropIfExists('assets');
    }
}
