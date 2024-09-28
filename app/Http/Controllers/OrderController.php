<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Customer;
use App\Models\Design;
use App\Models\Job;
use App\Models\Machine;
use App\Models\Order;
use App\Models\Style;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Order $model)
    {
        return view('switchprints.orders.index', ['orders' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('switchprints.orders.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //calculate the expected delivery date
        //the expected delivery date is calculated by getting all the jobs belonging to the machine
        // whose status is pending, 
        //get the expected delivery of the latest one then calculate 
        $expected_delivery_date = now(); 
        $total_amount = 0;
        $customer_id = $request->customer_id;
        if(!isset($customer_id)){
            $customer = Customer::create([
                'name' => $request->customer_name,
                'phone' => $request->phone,
                'address' => $request->customer_address,
                'branch_id' => auth()->user()->branch_id,
            ]);
            $customer_id = $customer->id;
        }
        // Create the order
        $order = Order::create([
            'customer_id' => $customer_id,
            'order_date' => $request->order_date,
            'expected_delivery_date' => $expected_delivery_date,
            'branch_id' => auth()->user()->branch_id,
            'user_id' => auth()->user()->id
        ]);

        // Loop through each design and machine to attach them to the order
        foreach ($request->design_id as $key => $designId) {
             // Calculate total amount by summing up amounts
            $amount = $request->amount[$key];
            $total_amount += $amount;

            //get the machine that was selected
            //get the number of stitches per hour of the machine
            //get the number of stitches the style needs
            // $selected_machine =  Machine::find($request->machine_id[$key]);
            // $selected_machine_stitches_per_shift = $selected_machine->stitches_per_shift; //50
            // $design_stitches = Design::find($designId)->stitches; //300
            // //calculate the time the machine will round up the job
            // $expected_job_delivery_date = Carbon::now()->addHours(ceil($design_stitches / $selected_machine_stitches_per_shift));
            if($request->expected_job_delivery_date[$key] > $expected_delivery_date){
                $expected_delivery_date = $request->expected_job_delivery_date[$key];
                $order->update([
                    'expected_delivery_date' => $expected_delivery_date
                ]);
            }
            
            $order->jobs()->create([
                'design_id' => $designId,
                'machine_id' => $request->machine_id[$key],
                'amount' => $request->amount[$key],
                'expected_delivery_date' => $request->expected_job_delivery_date[$key],
            ]);
        }

        $order->update([
            'total_amount' => $total_amount
        ]);

        return redirect('orders')->with('status','Order added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('switchprints.orders.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'branch_id' => 'required'
        ]);
        $order->update($request->all());
        
        return redirect('/orders')->with('status','Update succesful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {        
        $order->delete();
        
        return redirect('/orders')->with('status','Delete succesful');
    }

    public function getEdd(Request $request)
    {
        $machine_id = $request->machineId;
        $design_id = $request->designId;

        // Fetch machine and design models
        $machine = Machine::findOrFail($machine_id);
        $design = Design::findOrFail($design_id);

        // Calculate the current job's estimated time (stitches / stitches per shift)
        $daysForThisJob = round($design->stitches / $machine->stitches_per_shift);
        $thisJobCurrentEdd = now()->addDays($daysForThisJob); // Add days based on stitches

        // Retrieve machine EDD from session, if exists
        $machinesEdd = session()->get('machines-edd', []);

        // If the session for machine's EDD is empty, calculate based on the database
        if (empty($machinesEdd[$machine->id])) {
            // Get the last job's expected delivery date for this machine from the database
            $machineLastJob = $machine->jobs()->orderBy('expected_delivery_date', 'desc')->first();
            $machineLastEdd = $machineLastJob ? $machineLastJob->expected_delivery_date : now();

            // Initialize machine EDD in session
            $machinesEdd[$machine->id] = $machineLastEdd; 
        }

        // Get the machine's last EDD from session
        $machineLastEdd = $machinesEdd[$machine->id];

        // Calculate the final EDD: compare last EDD from session or DB and current job EDD
        $edd = $machineLastEdd->greaterThan(now()) 
            ? $machineLastEdd->addDays($daysForThisJob) // If last job EDD is in the future, add to it
            : $thisJobCurrentEdd; // Otherwise, use the current job EDD

        // Update session with the new calculated EDD for the machine
        $machinesEdd[$machine->id] = $edd;
        session()->put('machines-edd', $machinesEdd);

        return response()->json([
            'edd' => $edd->toDateTimeString(),
        ]);
    }

    public function updateJobStatus(Request $request)
    {
        $request->validate([
            'job_id' => 'required',
            'status' => 'required',
        ]);
        $job = Job::findorFail($request->job_id);
        $job->update(['status' => $request->status]);
        
        return response()->json([
            'status' => 'Update successful',
        ]);
    }
}
