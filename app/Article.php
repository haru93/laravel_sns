<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    public function user(): BelongsTo//※１
    {
        return $this->belongsTo('App\User');//※２
            
    }
}


// ※１
// 　戻り値の型宣言　
// :BelongsTo は、このメソッドの戻り値の「型」を宣言しています。ここでは、userメソッドの戻り値が、BelongsToクラスであることを宣言しています。

// ※２
// 　$thisは、Articleクラスのインスタンス自身を指す。$this->メソッド名()とすることで、インスタンスが持つメソッドが実行され、
// 　$this->プロパティ名とすることで、インスタンスが持つプロパティを参照します。
// 　　リレーション
// 　Modelクラスを継承していることで、belongsToメソッドが使える。belongsToメソッドの引数には関係するモデルの名前を文字列で渡します。
// 　すると、belongsToメソッドは、関係するモデルとのリレーション(belongsToメソッドの場合は、BelongsToクラス)を返します。
// ★このようなリレーションを返すuserメソッドを作っておくと、$article->user->nameとコードを書くことで、
// 　記事モデルから紐付くユーザーモデルのプロパティ(ここではname)にアクセスできるようになります。
// 　記事と、記事を書いたユーザーは多対1の関係ですが、そのような関係性の場合には、belongsToメソッドを使います。
// 　1対1の関係は、hasOneメソッド　1対多の関係は、hasManyメソッド　多対多の関係は、belongsToManyメソッド
// 　　外部キー名の省略について
// 　データベースとしてはarticlesテーブルのuser_idと、usersテーブルのidが結び付いています。
// 　これは、usersテーブルの主キーはid、articlesテーブルの外部キーは関連するテーブル名の単数形_id(つまりuser_id)であるという前提のもと、
// 　Laravel側で処理をしているためです。
// 　上記のようなネーミングルールになっていない場合は、belongsToメソッドに追加で引数を渡す必要がありますので注意してください。
// 　　リレーションの使い方の注意点
// 　userメソッドを定義しましたが、
// 　$article->user();としてもUserモデルは返ってきませんので、注意してください。
// 　$article->user;とすると、Userモデルが返ってきます。なお、user()がリレーションメソッドであるのに対し、
// 　()無しのuserは動的プロパティと呼ばれます。
// 　　リレーションまとめ
// 　$article->user;         //-- Userモデルのインスタンスが返る
// 　$article->user->name;   //-- Userモデルのインスタンスのnameプロパティの値が返る
// 　$article->user->hoge(); //-- Userモデルのインスタンスのhogeメソッドの戻り値が返る
// 　$article->user();       //-- BelongsToクラスのインスタンスが返る