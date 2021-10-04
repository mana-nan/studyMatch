@extends('layouts.layout')

@section('content')
<div class="mypage">
    <div class="container">
        <form class="form" method="POST" action="{{ action('MypageController@create')}}" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <label for="file_photo" class="rounded-circle userProfileImg">
                <div class="userProfileImg_description">画像をアップロード</div>
                <i class="fas fa-camera fa-3x"></i>
                <input type="file" id="file_photo" name="userImage">
          　</label> 
            <div class="form-group row">
                <label class="col-md-3">ユーザー名</label>
                <div class="col-md-9">
                　<input type= "text" name="userName" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">大学</label>
                <div class="col-md-9">
                　<input type= "text" name="university" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">学部</label>
                <div class="col-md-9">
                    <input type="text" name="faculty" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">自己紹介</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="introduction" rows="5"></textarea>
                </div>
            </div>
            <button type="submit" class="editButton">登録</button>
             {{ csrf_field() }}
        </form>
    </div>
    
</div>
@endsection