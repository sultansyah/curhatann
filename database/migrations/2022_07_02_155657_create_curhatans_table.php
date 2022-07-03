<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curhatans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('hashtags');
            $table->longText('isi');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::table('curhatans', function (Blueprint $table) {
            $table->dropForeign('curhatans_user_id_foreign');
            $table->dropIndex('curhatans_user_id_index');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('curhatans');
    }
};