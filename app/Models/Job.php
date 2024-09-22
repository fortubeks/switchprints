<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['design_id','machine_id','amount','expected_delivery_date','status'];
    protected $table = 'order_jobs';
    protected $casts = [
        'expected_delivery_date' => 'datetime',
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function design(){
        return $this->belongsTo(Design::class);
    }

    public function machine(){
        return $this->belongsTo(Machine::class);
    }
}
