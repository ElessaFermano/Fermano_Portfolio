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
        $education = Education::all();
        return view ('education.index')->with('education', $education);
    }

  
    public function create(): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        return view('education.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        education::create($input);
        return redirect('education')->with('flash_message', 'Information Addedd!');
    }

    public function show(string $id): View
    {
        $education = education::find($id);
        return view('education.show')->with('education', $education);
    }

    public function edit(string $id): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        $education = education::find($id);
        return view('education.edit')->with('education', $education);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $education = education::find($id);
        $input = $request->all();
        $education->update($input);
        return redirect('education')->with('flash_message', 'Information Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        education::destroy($id);
        return redirect('education')->with('flash_message', 'Information deleted!'); 
    }
}