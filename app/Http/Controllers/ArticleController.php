<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Mypage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
   
   public function add() {
      $mypage = Mypage::where('user_id', Auth::id())->first();
      //dd($mypage);
      return view('article.create', ['mypage' => $mypage]);
   }
   
   public function create(Request $request){
      
      $this->validate($request,Article::$rules);
      $article = new Article;
      
      $form = $request->all();
      
      unset($form['_token']);
      
      $article->fill($form);
      
      //ログイン中（記事投稿中）のユーザーID取得
      $article->user_id = Auth::id();
      
      $article->save();
      
      
      //記事投稿したらタイムライン画面に遷移
      return redirect('timeline/index');
   }
   
   public function index($id) {
      
      //表示するする記事を取得
      $article = Article::find($id);

      //マイページ取得
      $mypage = Mypage::where('user_id',$article->user_id)->first();
   
      //投稿詳細画面を表示
      return view('article.index',['article' => $article, 'mypage' => $mypage]);
   }
   
   public function edit($id) {
      
      //編集する記事を取得
      $article = Article::find($id);

      //マイページ取得
      $mypage = Mypage::where('user_id',$article->user_id)->first();
      
      //編集画面へ
      return view('article.edit',['mypage' => $mypage, 'article' => $article]);
   }
   
   public function update(Request $request) {
      
      $this->validate($request, Article::$rules);
      
      $article = Article::find($request->id);
      
      $form = $request->all();
      
      $article->fill($form);
      unset($article['_token']);
      $article->save();
      
      return redirect('timeline/index');
       
   }
   
   public function delete(Request $request) {
      
      $article = Article::find($request->id);
      $article->delete();
      
      return redirect('mypage/index');
   }
}
