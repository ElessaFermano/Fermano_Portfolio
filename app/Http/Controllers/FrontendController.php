<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    
    public function index()
    {
        $data = DB::table('about')->get();
        $educ = DB::table('education')->get();
        $skill = DB::table('skill')->get();
        $exp = DB::table('experience')->get();
        $con = DB::table('contact')->get();
        $bl = DB::table('blog')->get();
        $sem = DB::table('seminar')->get();

        return view('welcome', compact('data', 'educ','skill','exp','con','bl','sem'));
        
  


    }

    
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(string $id)
    {
        //
    }
}
