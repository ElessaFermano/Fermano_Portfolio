<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AboutController extends Controller
{

    public function index(): View
    {
        $about = About::all();
        return view ('about.index')->with('about', $about);
    }

 
    public function create(): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        return view('about.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        About::create($input);
        return redirect('about')->with('flash_message', 'Information Addedd!');
    }

    public function show(string $id): View
    {
        $about = About::find($id);
        return view('about.show')->with('about', $about);
    }

    public function edit(string $id): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        $about = about::find($id);
        return view('about.edit')->with('about', $about);
        
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $about = about::find($id);
        $input = $request->all();
        $about->update($input);
        return redirect('about')->with('flash_message', 'Information Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        about::destroy($id);
        return redirect('about')->with('flash_message', 'Information deleted!'); 
    }
}