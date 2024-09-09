<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
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
        $expected_delivery_date = '23/09/24';
        $total_amount = 0;
        // Create the order
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'user_id' => auth()->id(),
            'expected_delivery_date' => $expected_delivery_date,
            'branch_id' => auth()->user()->branch_id,
            'user_id' => auth()->user()->id
        ]);

        // Loop through each style and machine to attach them to the order
        foreach ($request->style_id as $key => $styleId) {
            $expected_job_delivery_date = '22/09/24';

             // Calculate total amount by summing up amounts
            $amount = $request->amount[$key];
            $total_amount += $amount;
            
            $order->jobs()->create([
                'style_id' => $styleId,
                'machine_id' => $request->machine_id[$key],
                'amount' => $request->amount[$key],
                'expected_delivery_date' => $expected_job_delivery_date,
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
        return view('switchprints.orders.form')->with('order',$order);
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
}
