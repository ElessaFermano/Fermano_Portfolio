<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ExperienceController extends Controller
{
    public function index(): View
    {
        $experience = Experience::get();
        return view ('experience.index')->with('experience', $experience);
    }

  
    public function create(): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        return view('experience.create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'title' => 'required',
            'details' => 'required',
            'image' => 'required',
       ]);

       if($request->hasFile('image')){
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public');
        $data['image'] = $imagePath;
       }
      
        Experience::create($data);
        
        return redirect('experience')->with('flash_message', 'Information Added!');
       
    }

    public function show(string $id): View
    {
        $experience = experience::find($id);
        return view('experience.show')->with('experience', $experience);
    }

    public function edit(string $id): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        $experience = experience::find($id);
        return view('experience.edit')->with('experience', $experience);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $experience = experience::find($id);
        $input = $request->all();
        $experience->update($input);
        return redirect('experience')->with('flash_message', 'Information Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        experience::destroy($id);
        return redirect('experience')->with('flash_message', 'Information deleted!'); 
    }
}