<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Page;
use App\User;
use App\UserReview;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->count();
        $pages = Page::page()->count();
        $posts = Page::post()->count();
        $reviews = UserReview::all()->count();

        return view('admin.dashboard')->with(compact('users', 'packages', 'features', 'pages', 'posts', 'reviews'));
    }

    public function ajax(Request $request)
    {

    }
}
