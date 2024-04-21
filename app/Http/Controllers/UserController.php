<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(): View
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == 'admin'){
                $user = User::all();  
                return view ('user.index')->with('users', $user);
            }
            else{
                abort(404);
            }
        }
      
    }

 
    public function create(): View
    {
        if(empty(auth()->role)){
            abort(404);
        }else{
            if(auth()->user()->role == 'admin'){
                return view('user.create');
            }else{
                abort(404);
            }
        }
        
    }

  
    public function store(Request $request): RedirectResponse
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }else{
            if(auth()->user()->role == 'admin'){
                $input = $request->all();
                user::create($input);
                return redirect()->route('user.index')->with('flash_message', 'Information Addedd!');
            }else{
                abort(404);
            }
        }
        
    }

    public function show(string $id): View
    {
        if(empty(auth()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == 'admin'){
                $user = User::find($id);
                return view('user.show')->with('users', $user);
            }else{
                abort(404);
            }
        }
        
       
    }

    public function edit(string $id): View
    {
        if(empty(auth()->role)){
            abort(404);
        }else{
            if(auth()->user()->role == 'admin'){
                $user = User::find($id);
                return view('user.edit')->with('users', $user);
            }else{
                abort(404);
            }
        }
        
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        if(empty(auth()->role)){
            abort(404);
        }else{
            if(auth()->user()->role == 'admin'){
                $user = User::find($id);
                $input = $request->all();
                $user->update($input);
                return redirect('users')->with('flash_message', 'Information Updated!'); 
            }else{
                abort(404);
            }
        }
         
    }

    
    public function destroy(string $id): RedirectResponse
    {
        if(empty(auth()->role)){
            abort(404);
        }else{
            if(auth()->user()->role == 'admin'){
                user::destroy($id);
        return redirect('users')->with('flash_message', 'Information deleted!'); 
            }else{
                abort(404);
            }
        }
        
    }
}
