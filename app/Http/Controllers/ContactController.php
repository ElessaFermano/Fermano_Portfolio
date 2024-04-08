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
        $contact = contact::all();
        return view ('contact.index')->with('contact', $contact);
    }

 
    public function create(): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        return view('contact.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        contact::create($input);
        return redirect('contact')->with('flash_message', 'Information Addedd!');
    }

    public function show(string $id): View
    {
        $contact = contact::find($id);
        return view('contact.show')->with('contact', $contact);
    }

    public function edit(string $id): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        $contact = contact::find($id);
        return view('contact.edit')->with('contact', $contact);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $contact = contact::find($id);
        $input = $request->all();
        $contact->update($input);
        return redirect('contact')->with('flash_message', 'Information Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        contact::destroy($id);
        return redirect('contact')->with('flash_message', 'Information deleted!'); 
    }
}