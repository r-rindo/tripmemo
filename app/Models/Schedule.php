<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'day' => 'required',
        'schedule_date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'schedule_title' => 'required',
        );
        
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }    
}
