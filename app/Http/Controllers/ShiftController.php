<?php

namespace App\Http\Controllers;

use App\Models\AssignedShift;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function viewForm(){
        return view('switchprints.shifts.assign');
    }
    

    public function assignShift(Request $request){
        $request->validate([
            'user_id' => 'required',
            'shift_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $user_id = $request->user_id;
        $shift_id = $request->shift_id;
        $machine_id = $request->machine_id;
    
        // Loop through the date range and assign shifts only for selected weeks
        while ($startDate->lessThanOrEqualTo($endDate)) {
            // Get the current week number in the month (1 to 4)
            AssignedShift::create([
                'user_id' => $user_id,
                'shift_id' => $shift_id,
                'shift_id' => $machine_id,
                'date' => $startDate->format('Y-m-d'),
            ]);
    
            // Move to the next day
            $startDate->addDay();
        }
    
        return redirect()->back()->with('success', 'Shifts assigned successfully for the selected date range!');
    }

    public function removeShift($id)
    {
        // Find the assigned shift by its ID
        $assignedShift = AssignedShift::findOrFail($id);

        // Delete the assigned shift
        $assignedShift->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Shift removed successfully!');
    }
}
