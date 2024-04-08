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
        $seminar = seminar::all();
        return view ('seminar.index')->with('seminar', $seminar);
    }

 
    public function create(): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        return view('seminar.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        seminar::create($input);
        return redirect('seminar')->with('flash_message', 'Information Addedd!');
    }

    public function show(string $id): View
    {
        $seminar = seminar::find($id);
        return view('seminar.show')->with('seminar', $seminar);
    }

    public function edit(string $id): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        $seminar = seminar::find($id);
        return view('seminar.edit')->with('seminar', $seminar);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $seminar = seminar::find($id);
        $input = $request->all();
        $seminar->update($input);
        return redirect('seminar')->with('flash_message', 'Information Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        seminar::destroy($id);
        return redirect('seminar')->with('flash_message', 'Information deleted!'); 
    }
}