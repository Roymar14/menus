<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
   
    public function index()
    {
        return view('admin.users.index');
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        if ($request->input('password')); {
            $input['password'] = bcrypt($input['password']);
        }
        user::create($input);
        session()->flash('success', 'create successfully');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    // untuk menampilkan detail
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // untuk menampilkan detail 
    public function edit(string $id)
    {
        //
        $user = User::findOrfail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    //ubntuk update data
    public function update(Request $request, string $id)
    {
        //
    $user = User::findOrfail($id);
    $data =$request ->all();
    if ($request->input('passwor')) {
        $data['password'] = bcrypt($data['password']);
    } else{
        $data = Arr::except($data, 'password');
    }

    $user->update($data); //method chaining
    return redirect()->route('admin.users.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    // delete data
    public function destroy(string $id)
    {
        //
        $user = User::findOrfail($id);
        $user->delete();
        return redirect('/admin/users');
    }
}
