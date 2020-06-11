<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');//※２

        return view('articles.index', ['articles' => $articles]);//※１
    }
}

// ※１
// 第二引数には、ビューファイルに渡す変数の名称と、その変数の値を連想配列形式で指定
// 他の渡し方
// return view('articles.index')->with(['articles' => $articles]);
// viewメソッドにwithメソッドを繋げて、withメソッドの引数にビューファイルに渡す変数の名称と、その変数の値を連想配列形式を指定します。
// return view('articles.index', compact('articles'));
// compact関数を使うと、変数を連想配列形式で記述しなくて良いので、コードの量が減ってスッキリします。

// ※２
// allメソッドは、モデルが持つクラスメソッドです。モデルの全データをコレクションで返します。
// さらにコレクションのメソッドである、sortByDescメソッドを使いcreated_atの降順で並び替えをしています。
// 以上により、Articleモデルの全データが最新の投稿日時順に並び替えられた上で$articles に代入されました。
// コレクションはPHPの配列を拡張したもので、Laravelに用意されたクラスです。
// コレクションは配列と同じように扱うことができますが、配列には無い、便利な様々なメソッドを使うことができます。
// sortByDescメソッドもそのひとつです。