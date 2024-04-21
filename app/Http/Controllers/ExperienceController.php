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
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == 'admin'){
                $experience = Experience::get();
            return view ('experience.index')->with('experience', $experience);
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
                return view('experience.create');
            }
            else{
                abort(404);
            }
        }
 
        
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
       if(empty(auth()->user()->role)){
        abort(404);
        }
        else{
        if(auth()->user()->role == 'admin'){
            Experience::create($data);
            return redirect('experience')->with('flash_message', 'Information Added!');
        }
        else{
            abort(404);
        }
    }
       
    }

    public function show(string $id): View
    {
        $experience = experience::find($id);
        return view('experience.show')->with('experience', $experience);
    }

    public function edit(string $id): View
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == 'admin'){
                $experience = experience::find($id);
                return view('experience.edit')->with('experience', $experience);
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
                $experience = experience::find($id);
                $input = $request->all();
                $experience->update($input);
                return redirect('experience')->with('flash_message', 'Information Updated!');
            }
            else{
                abort(404);
            }
        }
          
    }

    
    public function destroy(string $id): RedirectResponse
    {
        experience::destroy($id);
        return redirect('experience')->with('flash_message', 'Information deleted!'); 
    }
}