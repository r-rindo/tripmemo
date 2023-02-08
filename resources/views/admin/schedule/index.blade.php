@extends('layouts.app')
@section('schedule_title','スケジュール')

@section('content')
    <div class="container">
        <div class="row">
            {{ $plan->title }}
            {{ $plan->start_date }}
        　　<div class="col-md-4">
            　　<a href="{{ route('admin.home') }}" role="button" class="btn btn-success">戻る</a>
        　　</div>
        </div>
            <div class="list-plan col-md-10 mx-auto">
                <div class="row">
                    <table class="table table-Secondary">
                        <thead>
                            <th width="5%">ID</th>
                            <th width="10%">日にち</th>
                            <th width="10%">日付</th>
                            <th width="30%">タイトル</th>
                            <th width="10%">開始時間</th>
                            <th width="10%">終了時間</th>
                            <th width="10%">画像</th>
                        </thead>
                        <tbody>
                            @foreach($plan->schedules as $schedule)
                                <tr>
                                    <th>{{ $schedule->id }}{{ $schedule->plan_id }}</th>
                                        <td>{{ $schedule->day }}</td>
                                        <td>{{ $schedule->schedule_date }}</td>
                                        <td>{{ Str::limit($schedule->schedule_title,100) }}</td>
                                        <td>{{ $schedule->start_time }}</td>
                                        <td>{{ $schedule->end_time }}</td>
                                        <td>{{ $schedule->image_site }}</td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-sm"href="{{ route('admin.schedule.edit', ['id' => $schedule->id]) }}">編集</a>
                                            <a class="btn btn-danger btn-sm"href="{{ route('admin.schedule.delete',['id' => $schedule->id]) }}">削除</a>
                                            <!--<form action="{{-- route('admin.schedule.delete',['id'=> $schedule->id]) --}}"　method="post">-->
                                            <!--    <botton type="submit" class="btn btn-delete">削除</botton>-->
                                            <!--</form>-->
                                        </td>
                                </tr>
                            @endforeach 
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection