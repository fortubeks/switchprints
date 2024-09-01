<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    protected $fillable = ['name','branch_id','stitches_per_hour','required_maintenance_per_year'];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function maintenanceRecords(){
        return $this->hasMany(MaintenanceRecord::class);
    }
}
