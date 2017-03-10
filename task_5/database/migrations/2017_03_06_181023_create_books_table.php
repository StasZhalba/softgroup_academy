<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('authorId')->unsigned();
            $table->foreign('authorId')->references('id')->on('authors');
            $table->string('name', 30);
            $table->integer('genreId')->unsigned();
            $table->foreign('genreId')->references('id')->on('genres');
            $table->integer('pages');
            $table->string('publisherYear', 4);
            $table->integer('editionId')->unsigned();
            $table->foreign('editionId')->references('id')->on('editions');
            $table->date('receipt');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
