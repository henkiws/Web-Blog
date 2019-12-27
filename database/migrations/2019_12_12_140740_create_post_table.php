<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_author');
            $table->string('post_slug');
            $table->string('post_title');
            $table->text('post_content');
            $table->string('post_type')->comment('post, page, revision');
            $table->string('post_status')->comment('publish, draft');
            $table->string('comment_status')->comment('open, close');
            $table->integer('comment_count')->default(0);
            $table->bigInteger('category_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
