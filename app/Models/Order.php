<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','branch_id','status','order_date','expected_delivery_date','total_amount',
        'date_collected'];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
