<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageextensionPageextensionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('page__extension_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('sub_title')->nullable();

            $table->integer('pageextension_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['pageextension_id', 'locale']);
            $table->foreign('pageextension_id')->references('id')->on('page__extensions')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('page__extension_translations');
        Schema::enableForeignKeyConstraints();
    }
}
