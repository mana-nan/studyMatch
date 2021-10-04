@extends('layouts.layout')

@section('content')
<div class="timeline">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <form id="form2" action="{{ action('TimelineController@index') }}" method="get">
                    <input id="sbox2"  id="s" name="keyword" type="text"  value="{{ $keyword }}" placeholder="キーワード検索">
                    <button type="submit" id="sbtn2"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        @foreach ($articles as $article)
            <div class="card-contents">
                <div class="row mx-auto">
                    <div class="rounded-circle">
                        <object>
                            <a class="inlink" href="{{ action('MypageController@index', ["id"=>$article->user->mypage->user_id]) }}">
                                <img src="{{ asset('storage/image/' . $article->user->mypage->image_path) }}">
                            </a>
                        </object>
                    </div>
                    <h2>{{ $article->user->mypage->userName }}</h2>
                </div>
                <li>何する？</li>
                <p>{{ $article->what }}</p>
                <li>どこで？</li>
                <p>{{ $article->where }}</p>
                <li>メッセージ</li>
                <p>{{ $article->message }}</p>
                <a href="{{ action('ArticleController@index',['id'=>$article->id])}}"></a>    
            </div>
        @endforeach
    </div>
</div>
@endsection
