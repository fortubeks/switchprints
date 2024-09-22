<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function index(Design $model)
    {
        return view('switchprints.designs.index', ['designs' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('switchprints.designs.form');
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
            'stitches' => 'required',
            'price' => 'required'
        ]);
        $design = Design::create($request->all());

        if($request->file('image')){
            $allowedExtensions=['pdf','jpg','png','jpeg'];
            $file = $request->file('image');
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), $allowedExtensions)) {
                // Generate a unique filename to avoid conflicts
                $newFilename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
    
                // Store the image in the 'designs' disk
                $path = $file->storeAs('designs', $newFilename, 'public');
    
                // Update the design's image attribute
                $design->image = $path;
                $design->save();
            }
        }
        if($request->file('dst')){
            $allowedExtensions=['dst'];
            $file = $request->file('dst');
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), $allowedExtensions)) {
                // Generate a unique filename to avoid conflicts
                $newFilename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
    
                // Store the image in the 'designs' disk
                $path = $file->storeAs('designs', $newFilename, 'public');
    
                // Update the design's image attribute
                $design->dst = $path;
                $design->save();
            }
        }

        return redirect('designs')->with('status','Design added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(Design $design)
    {
        return view('switchprints.designs.form')->with('design',$design);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(Design $design)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Design $design)
    {
        $request->validate([
            'name' => 'required',
            'stitches' => 'required',
            'price' => 'required'
        ]);
        $design->update($request->all());
        if($request->file('image')){
            $allowedExtensions=['pdf','jpg','png','jpeg'];
            $file = $request->file('image');
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), $allowedExtensions)) {
                // Generate a unique filename to avoid conflicts
                $newFilename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
    
                // Store the image in the 'designs' disk
                $path = $file->storeAs('designs', $newFilename, 'public');
    
                // Update the design's image attribute
                $design->image = $path;
                $design->save();
            }
        }
        if($request->file('dst')){
            $allowedExtensions=['dst'];
            $file = $request->file('dst');
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), $allowedExtensions)) {
                // Generate a unique filename to avoid conflicts
                $newFilename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
    
                // Store the image in the 'designs' disk
                $path = $file->storeAs('designs', $newFilename, 'public');
    
                // Update the design's image attribute
                $design->dst = $path;
                $design->save();
            }
        }
        
        return redirect('/designs')->with('status','Update succesful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(Design $design)
    {        
        $design->delete();
        
        return redirect('/designs')->with('status','Delete succesful');
    }
}
