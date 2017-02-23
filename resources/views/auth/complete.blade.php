@extends('layouts.studio')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">スタジオの本登録を受け付けました<br/>ログインしてください。</div>
                <div class="panel-body">
                    <p><a href="{{ url('studio/login') }}" class="btn-default">ログイン</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
