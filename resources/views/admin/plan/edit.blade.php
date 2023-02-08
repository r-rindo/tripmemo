@extends('layouts.app')
@section('title', '旅のしおり編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>旅のしおり編集</h2>
                <form action="{{ route('admin.plan.update') }}" method="post" enctype="multipart/form-data">
                    　　@csrf
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                　　@endif
                <div class="form-group row">
                    <label class="col-md-2" for="title">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ $plan_form->title }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="start_date">出発日</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="start_date" value="{{ $plan_form->start_date }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="arrival_date">到着日</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="arrival_date" value="{{ $plan_form->arrival_date }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="image_cite">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image_cite">
                        <div class="form-text text-info">
                            設定中: {{ $plan_form->image_cite }}
                        </div>
                        　　<div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                    </div>
                </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $plan_form->id }}">
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                    <!--<form action="{{-- route('admin.plan.delete') --}}" method="post" enctype="multipart/form-data"> -->
                    <!--    <input type="hidden" name="id" value="{{-- $schedule_form->id --}}">-->
                    <!--        @csrf-->
                    <!--    <input type="submit" class="btn btn-primary" value="削除">-->
                    <!--</form>-->
                    <h2>スケジュール編集</h2>
                    <form action="{{ route('admin.schedule.create') }}" method="post" enctype="multipart/form-data">
                    　　　　@csrf
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                　　@endif
                        <div class="form-group row">
                            <label class="col-md-2" for="scedull_title">タイトル</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="schedule_title" value="{{ $schedule_form->scedull_title }}">
                                </div>   
                        </div>
                        <div class="form-group row">
                        <label class="col-md-2" for="day">日にち</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="day" value="{{ $schedule_form->day }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="schedule_date">日付</label>
                                <div class="col-md-5">
                                    <input type="date" class="form-control" name="schedule_date" value="{{ $schedule_form->schedule_date }}">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="start_time">開始時間</label>
                                <div class="col-md-5">
                                    <input type="time" class="form-control" name="start_time" value="{{ $schedule_form->start_time }}">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="end_time">終了時間</label>
                                <div class="col-md-5">
                                    <input type="time" class="form-control" name="end_time" value="{{ $schedule_form->end_time }}">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="image_site">画像</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" name="image_site">
                                        <div class="form-text text-info">
                                            設定中: {{ $schedule_form->image_site }}
                                        </div>
                        　　          <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                        </label>
                        　　          </div>
                    　　          </div>
                　　      </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="plan_id" value="{{ $plan_form->id }}">
                            <input type="submit" class="btn btn-primary" value="作成">
                        </div>
                    </div>
                </form>
                    </div>
            </div>        
        </div>
    </div>
@endsection 