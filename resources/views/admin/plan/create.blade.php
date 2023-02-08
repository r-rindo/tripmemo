{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.app')
{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '日程入力画面')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>日程入力画面</h2>
                <form action="{{route('admin.plan.create') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">出発日</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}">
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">到着日</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="arrival_date" value="{{ old('arrival_date') }}"> 
                        </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-2">画像</label>
                    <div class="col-md-2">
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                @csrf
                    <div class="col-md-2">
                         <input type="submit" class="btn btn-primary" value="保存">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection