<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->integer('host_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('meetingtitle');
            $table->date('meetingdate');
            $table->time('meetingtime');
            $table->timestamps();
            $table->foreign('host_id')->references('id')->on('profiles')

            ->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('profiles')

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
        Schema::dropIfExists('meetings');
    }
}
