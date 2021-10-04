@extends('layouts.layout')

@section('content')
<div class="article">
    <div class="container">
          　
          　<div class="rounded-circle userProfileImg">
                <img src="{{ asset('storage/image/' . $mypage->image_path) }}">
          　</div> 
            <h3>{{ $mypage->userName }}</h3>
          　
        <form class="form" method="POST" action="{{ action('ArticleController@create')}}" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group row">
                <label class="col-md-3">何する？</label>
                <div class="col-md-9">
                　<input type="text" name="what" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">どこで？</label>
                <div class="col-md-9">
                　<input type= "text" name="where" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">メッセージ</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="message" rows="5"></textarea>
                </div>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="postButton">投稿</button>
        </form>
    </div>
    
</div>
@endsection