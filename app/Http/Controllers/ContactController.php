<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ContactController extends Controller
{

    public function index(): View
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == 'admin'){
                $contact = contact::all();
                return view ('contact.index')->with('contact', $contact);
            }
            else{
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
            if(auth()->user()->role == 'admin'){
                return view('contact.create');
            }
            else{
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
            if(auth()->user()->role == 'admin'){
                $input = $request->all();
                contact::create($input);
                return redirect('contact')->with('flash_message', 'Information Addedd!');
            }
            else{
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
            if(auth()->user()->role == 'admin'){
                $contact = contact::find($id);
                return view('contact.show')->with('contact', $contact);
            }
            else{
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
            if(auth()->user()->role == 'admin'){
                $contact = contact::find($id);
                return view('contact.edit')->with('contact', $contact);
            }
            else{
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
            if(auth()->user()->role == 'admin'){
                $contact = contact::find($id);
                $input = $request->all();
                $contact->update($input);
                return redirect('contact')->with('flash_message', 'Information Updated!');
            }
            else{
                abort(404);
            }
        }
          
    }

    
    public function destroy(string $id): RedirectResponse
    {
        contact::destroy($id);
        return redirect('contact')->with('flash_message', 'Information deleted!'); 
    }
}