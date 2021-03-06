<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('body');
            $table->bigInteger('user_id')->unsigned();//MySQLの場合、外部キーとして使っているカラムは定義時に、->unsigned を付す必要がある。
            $table->foreign('user_id')->references('id')->on('users');//外部キー制約　articlesテーブルのuser_idカラムには、usersテーブルに存在するidと同じ値しか入れられなくなります。つまり、「記事は存在するけれど、それを投稿したユーザーが存在しない」という状態を作れないようになります。
            $table->timestamps();//created_atとupdated_atの2つのカラムは、マイグレーションファイルの$table->timestamps();に対応しています。
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
