<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//以下の一行を追記することでPlan Modelが扱えるようになる
use App\Models\Plan;
use App\Models\Schedule;

class PlanController extends Controller
{
    public function add()
    {
        return view('admin.plan.create');
    }
    public function create(Request $request)
    {
        
        // dd($request);
        $this->validate($request, Plan::$rules);
        
        $plan = new Plan;
        $form = $request->all();
        
        
        //フォームから画像が送信されてきたら、保存して >image_pathに画像のパスを保存する
        if (isset($form['image'])) {$path = $request->file('image')->store('public/image');
        $plan->image_path = basename($path); } else { $plan->image_path = null;
        }
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        //フォームから送信されてきたimageを削除する
        unset($form['image']);
        //データベースに保存する
        $plan->fill($form);
        $plan->save();
        
        //　　/にリダイレクトする
        return redirect('/');
    }
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = Plan::where('title',$cond_title)->get();
        } else { 
            //それ以外はすべてのプランを取得する
            $posts = Plan::all();
        }
        return view('admin.plan.index', ['posts' =>$posts, 'cond_title' => $cond_title]);
    }
    public function edit(Request $request)
    {
        //dd("editがうごいた");
        //Plan Modelからデータを取得する
        $plan = Plan::find($request->id);
        //dd($plan);
        if(empty($plan)) {
            abort(404);
        }
        $schedule = new Schedule;
        
        return view('admin.plan.edit', ['plan_form' =>$plan, 'schedule_form' =>$schedule]);
    }
    public function update(Request $request)
    {
        //validationをかける
        $this->validate($request, Plan::$rules);
        //Plan Modelからデータを取得する
        $plan = Plan::find($request->id);
        //送信されてきたフォームでーたを格納する
        $plan_form = $request->all();
        if ($request->remove == 'true') {
            $plan_form['image_path'] = null;
        } elseif ($request->file('image')) {$path = $request->file('image')->store('public/image');
        $plan_form['image_path'] = basename($path);
        } else {
            $plan_form['image_path'] = $plan->image_path;
        }
        
        unset($plan_form['image']);
        unset($plan_form['remove']);
        unset($plan_form['_token']);
        
        //該当するデータを上書きして保存する
        $plan->fill($plan_form)->save();
        
        return redirect('/');
    }
        
    public function delete(Request $request)
    {
        // dd('delete');
        //該当するPlan Modelを取得
        $plan = Plan::find($request->id);
        
        //削除する
        $plan ->delete();
        return redirect('/');
    }
}
