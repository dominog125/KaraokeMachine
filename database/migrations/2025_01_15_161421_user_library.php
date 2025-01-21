<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('TableHistory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idSong');
            $table->timestamps();

            $table->foreign('idUser')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('idSong')
                ->references('id')
                ->on('t_song')
                ->onDelete('cascade');
        });

        Schema::create('TableLikedSongs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idSong');
            $table->timestamps();

            $table->foreign('idUser')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('idSong')
                ->references('id')
                ->on('t_song')
                ->onDelete('cascade');
        });

        Schema::create('TableLovedSongs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idSong');
            $table->timestamps();

            $table->foreign('idUser')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('idSong')
                ->references('id')
                ->on('t_song')
                ->onDelete('cascade');
        });

        Schema::create('TablePlaylists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->string("namePlaylist",50);
            $table->timestamps();

            $table->foreign('idUser')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });

        Schema::create('TablePlaylistTracks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPlaylist');
            $table->unsignedBigInteger("idSong");
            $table->timestamps();

            $table->foreign('idPlaylist')
                ->references('id')
                ->on('TablePlaylists')
                ->onDelete('cascade');

            $table->foreign('idSong')
                ->references('id')
                ->on('t_song')
                ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('TablePlaylistTracks', function (Blueprint $table) {
            $table->dropForeign(['idPlaylist']);
            $table->dropForeign(['idSong']);
        });
        Schema::dropIfExists('TablePlaylistTracks');

        Schema::table('TablePlaylists', function (Blueprint $table) {
            $table->dropForeign(['idUser']);
        });
        Schema::dropIfExists('TablePlaylists');

        Schema::table('TableLovedSongs', function (Blueprint $table) {
            $table->dropForeign(['idUser']);
            $table->dropForeign(['idSong']);
        });
        Schema::dropIfExists('TableLovedSongs');

        Schema::table('TableLikedSongs', function (Blueprint $table) {
            $table->dropForeign(['idUser']);
            $table->dropForeign(['idSong']);
        });
        Schema::dropIfExists('TableLikedSongs');

        Schema::table('TableHistory', function (Blueprint $table) {
            $table->dropForeign(['idUser']);
            $table->dropForeign(['idSong']);
        });
        Schema::dropIfExists('TableHistory');

    }
};
