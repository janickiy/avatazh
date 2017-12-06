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

    public function ajax(Request $request, UserReview $userReview)
    {
        if (isset($request->action)) {
            switch($request->action) {
                case 'approve':
                    $userReview->id = 3;
                    $userReview->exists = true;
                    $userReview->published = 1;
                    $userReview->published_at = \Carbon::now();
                    $userReview->updated_at = \Carbon::now();

                    if ($userReview->save()) {
                        return response()->json(['success' => 'Отзыв одобрен']);
                    } else {
                        return response()->json(['error' => 'Ошибка веб приложения! Действия не были выполнены.']);
                    }

                    break;
            }
        }
    }
}
