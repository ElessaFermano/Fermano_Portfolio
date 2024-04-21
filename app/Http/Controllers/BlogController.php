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
        if(empty(auth()->user()->role)){
            abort(404);
        }
        else{
            if(auth()->user()->role == 'admin'){
                $blog = Blog::all();
        return view ('blog.index')->with('blog', $blog);
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
                return view('blog.create');
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
                Blog::create($input);
                return redirect('blog')->with('flash_message', 'Information Addedd!');
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
                $blog = Blog::find($id);
                return view('blog.show')->with('blog', $blog);
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
                $blog = Blog::find($id);
                return view('blog.edit')->with('blog', $blog);
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
                $blog = Blog::find($id);
                $input = $request->all();
                $blog->update($input);
                return redirect('blog')->with('flash_message', 'Information Updated!');
            }
            else{
                abort(404);
            }
        }
          
    }

    
    public function destroy(string $id): RedirectResponse
    {
        Blog::destroy($id);
        return redirect('blog')->with('flash_message', 'Information deleted!'); 
    }
}