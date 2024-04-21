<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SeminarController extends Controller
{

    public function index(): View
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == "admin"){
                $seminar = seminar::all();
                return view ('seminar.index')->with('seminar', $seminar);
            }else{
                abort(404);
            }
            
        }
        
    }

 
    public function create(): View
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == "admin"){
                return view('seminar.create');
            }else{
                abort(404);
            }
            
        }
        
    }

  
    public function store(Request $request): RedirectResponse
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == "admin"){
                $input = $request->all();
                seminar::create($input);
                return redirect('seminar')->with('flash_message', 'Information Addedd!');
            }else{
                abort(404);
            }
            
        }
        
    }

    public function show(string $id): View
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == "admin"){
                $seminar = seminar::find($id);
                return view('seminar.show')->with('seminar', $seminar);
            }else{
                abort(404);
            }
            
        }
        
    }

    public function edit(string $id): View
    {
        if(empty(auth()->user()->role)){
        abort(404);
    }
    else{
        if(auth()->user()->role == "admin"){
            $seminar = seminar::find($id);
            return view('seminar.edit')->with('seminar', $seminar);
        }else{
            abort(404);
        }
        
    }
       
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == "admin"){
                $seminar = seminar::find($id);
                $input = $request->all();
                $seminar->update($input);
                return redirect('seminar')->with('flash_message', 'Information Updated!');
            }else{
                abort(404);
            }
            
        }
          
    }

    
    public function destroy(string $id): RedirectResponse
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == "admin"){
                seminar::destroy($id);
        return redirect('seminar')->with('flash_message', 'Information deleted!');
            }else{
                abort(404);
            }
            
        }
         
    }
}