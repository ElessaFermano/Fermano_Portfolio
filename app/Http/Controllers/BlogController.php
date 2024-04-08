<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{

    public function index(): View
    {
        $blog = Blog::all();
        return view ('blog.index')->with('blog', $blog);
    }

 
    public function create(): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        return view('blog.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Blog::create($input);
        return redirect('blog')->with('flash_message', 'Information Addedd!');
    }

    public function show(string $id): View
    {
        $blog = Blog::find($id);
        return view('blog.show')->with('blog', $blog);
    }

    public function edit(string $id): View
    {
        if(auth()->user()->role =="spectator"){
            return abort(403, 'Denied Access');
        }
        $blog = Blog::find($id);
        return view('blog.edit')->with('blog', $blog);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $blog = Blog::find($id);
        $input = $request->all();
        $blog->update($input);
        return redirect('blog')->with('flash_message', 'Information Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        Blog::destroy($id);
        return redirect('blog')->with('flash_message', 'Information deleted!'); 
    }
}