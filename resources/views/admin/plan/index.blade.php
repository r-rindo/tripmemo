@extends('layouts.app')
@section('title', '旅のしおり一覧')

@section('content')

    <div class="container">
        <div class="row">
            <h2>旅のしおり一覧</h2>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.plan.add') }}" role="button" class="btn btn-primary">しおり新規作成</a>
        </div>
        <div class="col-md-8">
            <form action="{{ route('admin.home') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2">タイトル</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                    </div>
                    <div class="col-md-2">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
            </form>
        </div>
    </div> 
    <div class="row">
        <div class="list-plan col-md-8 mx-auto">
            <div class="row">
                <table class="table table-Secondary">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="40%">タイトル</th>
                            <th width="40%">日付</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($posts as $plan)
                        <tr>
                            <th>{{ $plan->id }}</th>
                            <td>{{ Str::limit($plan->title,100) }}
                                <div>
                                    <a href="{{ route('admin.plan.edit', ['id' => $plan->id]) }}">編集</a>
                                    <a href="/admin/schedule?id={{$plan->id}}">スケジュール一覧</a>
                                </div>
                                <a href="{{ route('admin.plan.delete',['id' => $plan->id]) }}">削除</a>
                            </td>
                            <td>{{ $plan->start_date }}~{{$plan->arrival_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
    