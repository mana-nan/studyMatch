<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mypage;
use App\Article;
use App\User;
use Intervention\Image\Facades\Image;

class MypageController extends Controller
{
    public function add() {
        return view('mypage.create');
        
    }
    
    //mypage登録処理
    public function create(Request $request) {
        
        $this->validate($request, Mypage::$rules);
        
        $mypage = new Mypage;
        $form = $request->all();
    
        //ユーザーIDの追加
        //$form['user_id'] = Auth::id();
        $mypage->user_id = Auth::id();
        
        $userImage = $request->file('userImage');

        $imageName = $userImage->getClientOriginalName();
        $fileName =  'public/image/' . $imageName;
        
        Image::make($userImage)->resize(100,100)->save(storage_path() . '/app/' . $fileName);
        $mypage->image_path = $imageName;
        
       
        //token,画像の消去
        unset($form['_token']);
        unset($form['userImage']);
        
       // データベースに保存する
        $mypage->fill($form);
        $mypage->save();
        
        return redirect('mypage/index');
    }
    
    
    //以下追記途中
    public function index(Request $request) {
 
        //マイページ（プロフィール）取得
        $mypage = Mypage::where('user_id',$request->id)->first();
        
        //そのユーザーの投稿記事を取得
        $articles = Article::where('user_id',$mypage->user_id)->get();
        
        
        return view('mypage.index',['mypage' => $mypage, 'articles' => $articles]);

    }
   
    public function edit(Request $request) {
        
        //編集するマイページを取得
        $mypage = Mypage::where('user_id', Auth::id())->first();
        //編集画面へ
        return view('mypage.edit',['mypage' => $mypage]);
        
    }
    
    public function update(Request $request) {
        
        //編集するマイページの情報を取得、表示
        $mypage = Mypage::where('user_id', Auth::id())->first();
        $form = $request->all();
        
        
        //画像が更新されたら
        if (!is_null($request->userImage)) {
            $userImage = $request->file('userImage');
            
            $imageName = $userImage->getClientOriginalName();
            $fileName =  'public/image/' . $imageName;
        
            Image::make($userImage)->resize(100,100)->save(storage_path() . '/app/' . $fileName);
            $form['image_path'] = $imageName;
        } else {
            $form['image_path'] = $mypage->image_path;
        }
        
        //ユーザーIDの追加
        $form['user_id'] = Auth::id();
        
        $mypage->fill($form);
        
        unset($form['_token']);
        unset($form['userImage']);
        
        $mypage->save();
        
        return redirect('mypage/index?id='. Auth::id());
        
        /*
        $mypage->userName = $request->userName;
        $mypage->userImage = $request->userImage;
        $mypage->university = $request->university;
        $mypage->faculty = $request->faculty;
        $mypage->introduction = $request->introduction;
        $mypage->save();
        */
        
    }
}
