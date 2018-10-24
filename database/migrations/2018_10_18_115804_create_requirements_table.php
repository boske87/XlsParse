<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clientId');
            $table->foreign('clientId')->references('clientId')->on('clients');
            $table->decimal('amount', 10, 2)->nullable();
            $table->dateTime('inputDate');
            $table->string('fileMetaDataId');
            $table->foreign('fileMetaDataId')->references('fileMetaDataId')->on('file_meta_datas');
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
        Schema::dropIfExists('requirements');
    }
}
