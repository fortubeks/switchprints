<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRecord extends Model
{
    use HasFactory;

    protected $fillable = ['maintenance_date','notes','machine_id','next_maintenance_date',
    'replaced_parts'];

    public function machine(){
        return $this->belongsTo(Branch::class);
    }
}
