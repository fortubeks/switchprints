<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index(Machine $model)
    {
        return view('switchprints.machines.index', ['machines' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('switchprints.machines.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stitches_per_hour' => 'required'
        ]);
        $request->merge(['required_maintenance_per_year' => 4]);
        Machine::create($request->all());

        return redirect('machines')->with('status','Machine added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machine  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $branch)
    {
        return view('switchprints.machines.form')->with('branch',$branch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machine  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machine  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Machine $branch)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $branch->update($request->all());
        
        return redirect('/machines')->with('status','Update succesful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machine  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $branch)
    {        
        $branch->delete();
        
        return redirect('/machines')->with('status','Delete succesful');
    }
}
