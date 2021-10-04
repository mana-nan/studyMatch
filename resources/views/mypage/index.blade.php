@extends('layouts.layout')

@section('content')
<div class="mypage">
    <div class="container">
        <div class="profile" style="text-align: center">
            <div class="rounded-circle userProfileImg">
                  <img src="{{ asset('storage/image/' . $mypage->image_path) }}">
          　</div> 
            <div class="form-group row">
                <h2>{{ $mypage->userName }}<h2>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3">大学</label>
                <div class="col-md-9">
                {{ $mypage->university }}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">学部</label>
                <div class="col-md-9">
                 {{ $mypage->faculty }}    
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">自己紹介</label>
                <div class="col-md-9">
                 {{ $mypage->introduction }}   
                </div>
            </div>
            
            
            <form class="form" method="GET" action="{{ action('MypageController@edit', ['user_id' => $mypage->user_id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $mypage->id }}">
                <input type="hidden" name="user_id" value="{{ $mypage->user_id }}">
            @if ($mypage->user_id == Auth::id())
                <button type="submit" class="editButton">編集</button>
            @endif
            </form>
            
        </div>
        
        <div class="article">
            @foreach ($articles as $article)
                <div class="card-contents">
                    <div class="row mx-auto">
                        <div class="rounded-circle">
                            <img src="{{ asset('storage/image/' . $mypage->image_path) }}">
                        </div>
                        <h2>{{ $mypage->userName }}</h2>
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
</div>
@endsection