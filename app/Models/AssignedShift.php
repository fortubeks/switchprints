<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedShift extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'shift_id', 'date', 'machine_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
