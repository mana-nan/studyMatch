@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-4">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
                <!--<div class="topImage">
                    <img src="{{ 'storage/image/open-book-1428428_1920.jpg' }}">
                </div>-->
        </div>
    </div>
</div>
@endsection
