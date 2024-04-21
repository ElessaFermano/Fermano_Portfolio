<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillController extends Controller
{

    public function index(): View
    {
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == 'admin'){
                $skill = Skill::all();
                return view ('skill.index')->with('skill', $skill);
            }
            else{
                abort(404);
            }
        }
        
    }

 
    public function create(): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        return view('skill.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        skill::create($input);
        return redirect('skill')->with('flash_message', 'Information Addedd!');
    }

    public function show(string $id): View
    {
        $skill = Skill::find($id);
        return view('skill.show')->with('skill', $skill);
    }

    public function edit(string $id): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        $skill = skill::find($id);
        return view('skill.edit')->with('skill', $skill);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $skill = skill::find($id);
        $input = $request->all();
        $skill->update($input);
        return redirect('skill')->with('flash_message', 'Information Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        skill::destroy($id);
        return redirect('skill')->with('flash_message', 'Information deleted!'); 
    }
}