<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Seminar;
use App\Models\Skill;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_users = User::count();
        $total_educ = Education::count();
        $total_skills = Skill::count();
        $total_exp = Experience::count();
        $total_blogs = Blog::count();
        $total_seminar = Seminar::count();
        

        return view('home', compact('total_users','total_educ','total_skills', 'total_exp', 'total_blogs', 'total_seminar'));
 
    }
}
