<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique(); //-- この行を変更  uniqueメソッドを使うことで、そのカラムにユニーク制約を付けることができます。ユニーク制約とは、このテーブル内で他のレコードと同じ値を重複させないという制約です。
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(); //-- この行を変更  nullableメソッドを使うことで、そのカラムにnullが入ることを許容します。本教材ではGoogleアカウントを使ったユーザー登録の場合にpasswordを設定不要にしているため、nullを許容するようにしています。
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
