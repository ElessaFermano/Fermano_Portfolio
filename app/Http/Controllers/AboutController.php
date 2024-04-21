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
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == 'admin'){
                $about = About::all();
                return view ('about.index')->with('about', $about);
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
            if(auth()->user()->role == 'admin') {
                return view('about.create');
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
            if(auth()->user()->role == 'admin') {
                $input = $request->all();
                About::create($input);
                return redirect('about')->with('flash_message', 'Information Addedd!');
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
            if(auth()->user()->role == 'admin') {
                $about = About::find($id);
                 return view('about.show')->with('about', $about);
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
            if(auth()->user()->role == 'admin') {
                $about = about::find($id);
                 return view('about.edit')->with('about', $about);
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
            if(auth()->user()->role == 'admin') {
                $about = about::find($id);
                $input = $request->all();
                $about->update($input);
                return redirect('about')->with('flash_message', 'Information Updated!');
            }
            else{
                abort(404);
            }
        
        }
          
    }

    
    public function destroy(string $id): RedirectResponse
    {
        about::destroy($id);
        return redirect('about')->with('flash_message', 'Information deleted!'); 
    }
}