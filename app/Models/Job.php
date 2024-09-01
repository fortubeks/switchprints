<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['style_id','machine_id','amount','expected_delivery_date','status'];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function style(){
        return $this->belongsTo(Style::class);
    }

    public function machine(){
        return $this->belongsTo(Machine::class);
    }
}
