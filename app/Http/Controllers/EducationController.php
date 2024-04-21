<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class EducationController extends Controller
{
    public function index(): View
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == 'admin'){
                $education = Education::all();
                return view ('education.index')->with('education', $education);
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
                return view('education.create');
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
                education::create($input);
                return redirect('education')->with('flash_message', 'Information Addedd!');
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
                $education = education::find($id);
                return view('education.show')->with('education', $education);
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
                $education = education::find($id);
                return view('education.edit')->with('education', $education);
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
                $education = education::find($id);
                $input = $request->all();
                $education->update($input);
                return redirect('education')->with('flash_message', 'Information Updated!');
            }
            else{
                abort(404);
            }
        }
          
    }

    
    public function destroy(string $id): RedirectResponse
    {
        education::destroy($id);
        return redirect('education')->with('flash_message', 'Information deleted!'); 
    }
}