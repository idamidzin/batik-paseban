<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsesBatikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses_batik', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->nullable();
            $table->unsignedInteger('batik_id')->index()->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('batik_id')
                ->references('id')->on('batik')
                ->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proses_batik');
    }
}
