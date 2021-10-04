@extends('layouts.layout')

@section('content')
<div class="article">
    <div class="container" style="text-align:center">
        <form class="form" method="POST" action="{{ action('ArticleController@update')}}" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="rounded-circle userProfileImg">
                <img src="{{ asset('storage/image/' . $mypage->image_path) }}">
          　</div> 
            <div class="form-group row">
                <label class="col-md-3">ユーザー名</label>
                <div class="col-md-9">
                    {{ $mypage->userName }}
                </div>
            </div>
            
           
            <div class="form-group row">
                <label class="col-md-3">何する？</label>
                <div class="col-md-9">
                    <input type="text" name="what" class="form-control" value=" {{ $article->what }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">どこで？</label>
                <div class="col-md-9">
                    <input type= "text" name="where" class="form-control" value="{{ $article->where }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">メッセージ</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="message" rows="5">{{ $article->message }}</textarea>   
                </div>
            </div>
            
            @auth
                <button type="submit" class="editButton">更新</button>
                <input type="hidden" value="{{ $article->id }}" name="id">
                {{ csrf_field() }}
            @endauth
        </form>
            
    </div>
    
</div>
@endsection