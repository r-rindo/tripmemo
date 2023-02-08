<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'start_date' => 'required',
        'arrival_date' => 'required',
    );
    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule');
    }

}

