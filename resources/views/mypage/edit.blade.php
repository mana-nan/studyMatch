@extends('layouts.layout')

@section('content')
<div class="mypage">
    <div class="container">
        <form class="form" method="POST" action="{{ action('MypageController@update')}}" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <label for="file_photo" class="rounded-circle userProfileImg">
                <div class="userProfileImg_description">画像をアップロード</div>
                <input type="file" id="file_photo" name="userImage" value="{{ asset('storage/image/' . $mypage->image_path) }}">
          　</label> 
          　<div class="form-text text-info">
                                設定中: {{ $mypage->image_path }}
            </div>

            <div class="form-group row">
                <label class="col-md-3">ユーザー名</label>
                <div class="col-md-9">
                　<input type= "text" name="userName" class="form-control" value="{{ $mypage->userName }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">大学</label>
                <div class="col-md-9">
                　<input type= "text" name="university" class="form-control" value="{{ $mypage->university }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">学部</label>
                <div class="col-md-9">
                    <input type="text" name="faculty" class="form-control" value="{{ $mypage->faculty }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">自己紹介</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="introduction" rows="5" maxlength="200">{{ $mypage->introduction }}</textarea>
                </div>
            </div>
            {{ csrf_field() }}
            <input type="hidden" value="{{ $mypage->id }}">
            <input type="hidden" value="{{ $mypage->user_id }}">
            @if ($mypage->user_id == Auth::id())
            <button type="submit" class="editButton">更新</button>
            @endif
        </form>
    </div>
    
</div>
@endsection