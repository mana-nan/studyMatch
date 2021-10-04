@extends('layouts.layout')

@section('content')
<div class="article">
    <div class="container" style="text-align:center">
            <div class="rounded-circle userProfileImg">
                <img src="{{ asset('storage/image/' . $mypage->image_path) }}">
          　</div> 
            <h3>{{ $mypage->userName }}</h3>
            
            <div class="form-group row">
                <label class="col-md-3">何する？</label>
                <div class="col-md-9">
                    {{ $article->what }}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">どこで？</label>
                <div class="col-md-9">
                    {{ $article->where }}    
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">メッセージ</label>
                <div class="col-md-9">
                    {{ $article->message }}   
                </div>
            </div>
            
            
            <form class="form" method="GET" action="{{ action('ArticleController@delete') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $article->id }}" name="id">
            @if ($article->user_id == Auth::id())
                <button type="submit" class="editButton">削除</button>
            @endif
            </form>
            <form class="form" method="GET" action="{{ action('ArticleController@edit', ['id' => $article->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $article->id }}"name="id">
                <input type="hidden" value="{{ $article->user_id }}"name="user_id">
            @if($article->user_id == Auth::id())    
                <button type="submit" class="editButton">編集</button>
            @endif
            </form>
            
            
    </div>
    
</div>
@endsection