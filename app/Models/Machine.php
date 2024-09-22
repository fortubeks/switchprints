<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    protected $fillable = ['name','branch_id','stitches_per_shift','required_maintenance_per_year'];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function maintenanceRecords(){
        return $this->hasMany(MaintenanceRecord::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function dateOfLastService(){
        // Check if there are any maintenance records
        $latestRecord = $this->maintenanceRecords()->latest('maintenance_date')->first();
        
        // If a record exists, return the maintenance_date; otherwise, return '-'
        return $latestRecord ? $latestRecord->maintenance_date : '-';
    }

    public function dateOfNextService(){
         // Check if there are any maintenance records
         $latestRecord = $this->maintenanceRecords()->latest('next_maintenance_date')->first();
        
         // If a record exists, return the maintenance_date; otherwise, return '-'
         return $latestRecord ? $latestRecord->maintenance_date : '-';
    }
}
