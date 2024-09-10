<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function index(Style $model)
    {
        return view('switchprints.styles.index', ['styles' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('switchprints.styles.form');
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
        $style = Style::create($request->all());

        if($request->file('image')){
            $allowedExtensions=['pdf','jpg','png','jpeg'];
            $file = $request->file('image');
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), $allowedExtensions)) {
                // Generate a unique filename to avoid conflicts
                $newFilename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
    
                // Store the image in the 'styles' disk
                $path = $file->storeAs('styles', $newFilename, 'public');
    
                // Update the style's image attribute
                $style->image = $path;
                $style->save();
            }
        }

        return redirect('styles')->with('status','Style added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function show(Style $style)
    {
        return view('switchprints.styles.form')->with('style',$style);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit(Style $style)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Style $style)
    {
        $request->validate([
            'name' => 'required',
            'stitches' => 'required',
            'price' => 'required'
        ]);
        $style->update($request->all());
        
        return redirect('/styles')->with('status','Update succesful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(Style $style)
    {        
        $style->delete();
        
        return redirect('/styles')->with('status','Delete succesful');
    }
}
