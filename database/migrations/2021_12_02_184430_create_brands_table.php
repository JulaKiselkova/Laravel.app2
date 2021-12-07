<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            //$table->bigInteger('id')->unsigned()->autoIncrement()->primary();
            $table->id();
            $table->string('name', 200)->nullable(false);
            $table->string('logo', 255)->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(false);
            $table->smallInteger('create_year');
            $table->timestamps();//дата время
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
