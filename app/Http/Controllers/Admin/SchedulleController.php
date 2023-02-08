<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Schedule;
use App\Models\Plan;
class SchedulleController extends Controller
{
    public function add()
    {
        return view('admin.plan.index');
    }
    
     public function create(Request $request)
    {
        //dd('create');
    
        $this->validate($request, Schedule::$rules);
        
        $schedule = new Schedule;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $schedule->image_site = basename($path);
        } else {
            $schedule->image_site = null;
        }
        unset($form['_tokn']);
        
        unset($form['image']);
        
        $schedule->fill($form);
        // $schedule->plan_id=$request->plan_id;
        $schedule->save();
        
        return redirect('admin/schedule?id=' . $request->plan_id);
    }
    public function index(Request $request)
    {
        // dd('index');
        $plan_id = $request->id;
        $plan= Plan::find($request->id);
        //dd($plan_id);
        //dd('index');
        //$schedules = Schedule::all();
        $schedules = Schedule::where('plan_id', $plan_id)->get();
       
        
        return view('admin.schedule.index',['plan' =>$plan]);
    } 
    public function edit(Request $request)
    {
        $schedule = Schedule::find($request->id);
        if(empty($schedule)) {
            abort(404);
        }
        
        return view('admin.schedule.edit', ['schedule_form' =>$schedule]);
    }
    public function update(Request $request)
    {
        //dd('update');
        $this->validate($request, Schedule::$rules);
        $schedule = Schedule::find($request->id);
        $schedule_form = $request->all();
        if($request->remove == 'true') {
            $schedule_form['image_site'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $schedule_form['image_site'] = $schedule->image_site;
        } else {
            $schedule_form['image_site'] = $schedule->image_site;
        }
        
        unset($schedule_form['image']);
        unset($schedule_form['remove']);
        unset($schedule_form['_token']);
        // dd($schedule);
        
        $schedule->fill($schedule_form)->save();
        
        
        return redirect('admin/schedule?id=' . $schedule->plan->id);
    }
    
    public function delete(Request $request)
    {
        
        $schedule = Schedule::find($request->id);
        
        $plan_id = $schedule->plan_id;
        
        $schedule ->delete();
        
        
        return redirect('admin/schedule?id=' . $plan_id);//->route('schedule.index');
    }
    
}
