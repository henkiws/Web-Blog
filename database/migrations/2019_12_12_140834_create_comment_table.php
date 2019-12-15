<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id');
            $table->string('comment_author');
            $table->string('comment_author_email');
            $table->string('comment_author_url');
            $table->string('comment_author_ip');
            $table->text('comment_content');
            $table->string('comment_type')->nullable();
            $table->tinyInteger('comment_approve')->default(0)->comment('0:Waiting 1:Publish 2:Reject');
            $table->bigInteger('user_id')->nullable();
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
        Schema::dropIfExists('comment');
    }
}
