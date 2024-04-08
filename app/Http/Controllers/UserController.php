<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {
        $user = User::all();
        return view ('user.index')->with('user', $user);
    }

 
    public function create(): View
    {
        return view('user.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
       $input = $request->all();
        user::create($input);
        return redirect('users')->with('flash_message', 'Information Addedd!');
    }

    public function show(string $id): View
    {
        $user = User::find($id);
        return view('user.show')->with('users', $user);
    }

    public function edit(string $id): View
    {
        $user = User::find($id);
        return view('user.edit')->with('users', $user);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);
        return redirect('users')->with('flash_message', 'Information Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        user::destroy($id);
        return redirect('users')->with('flash_message', 'Information deleted!'); 
    }
}
