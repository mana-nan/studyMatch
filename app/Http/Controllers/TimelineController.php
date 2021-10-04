<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Timeline;
use App\Article;
use App\Mypage;
use App\User;

class TimelineController extends Controller 
{
    public function index(Request $request) {
        
        //検索されたキーワードを取得
        $keyword = $request->input('keyword');
 
        //$articlesの定義
        //$articles = $query->get();
        
        if (!empty($keyword)) {
            // 検索されたら検索結果を取得する
            $articles = Article::where('what', 'LIKE', "%$keyword%")
                  ->orWhere('where', 'LIKE', "%$keyword%")->get();
                  
        } else {
            //それ以外はすべての記事を取得する
            $articles = Article::all();
        }
   
        return view('timeline.index',['articles' => $articles, 'keyword' => $keyword]);
    }
}