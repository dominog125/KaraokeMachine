<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class db extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_author', function (Blueprint $table) { //tabela
            $table->id('ID');
            $table->string('Author');
            $table->timestamps(0);
        });

        Schema::create('t_category', function (Blueprint $table) {
            $table->id('ID');
            $table->string('Category');
            $table->timestamps(0);
        });

        Schema::create('t_song', function (Blueprint $table) {
            $table->id('ID');
            $table->string('Title');
            $table->unsignedBigInteger('Author');
            $table->integer('Likes');
            $table->unsignedBigInteger('Category');
            $table->string('Ytlink');
            $table->timestamps(0);

            $table->foreign('Author')->references('ID')->on('t_author')->onUpdate('cascade');
            $table->foreign('Category')->references('ID')->on('t_category')->onUpdate('cascade');
        });

        Schema::create('t_request', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('IDSong');
            $table->unsignedBigInteger('UserID')->nullable(); // Dodanie kolumny UserID
            $table->text('RowPr');
            $table->time('TimePr');
            $table->text('RowPrOld')->nullable();
            $table->time('TimePrOld')->nullable();
            $table->enum('ChangeType', ['change_text', 'new_text'])->default('change_text');
            $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending');
            $table->timestamps(0);

            $table->foreign('UserID')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade'); // Definicja klucza obcego
            $table->foreign('IDSong')->references('ID')->on('t_song')->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::create('t_lyrics', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('IDSong');
            $table->text('RowTe');
            $table->time('TimeTe');
            $table->timestamps(0);

            $table->foreign('IDSong')->references('ID')->on('t_song')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('t_adminrequest', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('IDSong');
            $table->unsignedBigInteger('IDRow');
            $table->unsignedBigInteger('IDRowCh');
            $table->timestamps(0);

            $table->foreign('IDSong')->references('ID')->on('t_song')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('IDRow')->references('ID')->on('t_lyrics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('IDRowCh')->references('ID')->on('t_request')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_adminrequest');
        Schema::dropIfExists('t_lyrics');
        Schema::dropIfExists('t_request');
        Schema::dropIfExists('t_song');
        Schema::dropIfExists('t_category');
        Schema::dropIfExists('t_author');
    }
}
