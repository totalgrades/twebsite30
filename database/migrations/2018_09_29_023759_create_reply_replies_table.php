<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reply_id')->unsigned();
            $table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->longText('replyreply');
            $table->boolean('approved')->default(true);
            $table->integer('replyreply_likes')->default(0);
            $table->integer('replyreply_dislikes')->default(0);
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
        Schema::dropIfExists('reply_replies');
    }
}
