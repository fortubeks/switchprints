<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->employee_email,
            'other_details' => $request->other_details,
            'role_id' => $request->role_id,
            'parent_id' => auth()->user()->id,
            'bank_name'=> $request->bank_name,
            'bank_account_no'=> $request->bank_account_no,
            'bank_account_name'=> $request->bank_account_name,
            'branch_id' => $request->branch_id
        ]);
        if($request->is_user == 'yes'){
            $request->validate([
                'user_type' => ['required'],
            ]);
            $user = User::create([
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'name' => $request->first_name,
                'employee_id' => $user->id,
                'user_type' => $request->user_type,
                'branch_id' => $request->branch_id,
            ]);
            $user->user_id = $user->id;
            $user->save();
        }
        return redirect('/users/')->with('status','User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        if($request->is_user == 'yes'){
            User::updateOrcreate([
                'email'   => $request->email,
                'employee_id'   => $user->id,
            ],[
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'employee_id' => $user->id,
                'name' => $user->getFullName(),
                'user_type' => $request->user_type,
                'branch_id' => $request->branch_id,
            ]);
        }
        return redirect('/users')->with('status','Update succesful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->user){
            $user->user->delete();
        }
        
        $user->delete();
        
        return redirect('/users')->with('status','Delete succesful');
    }
}
