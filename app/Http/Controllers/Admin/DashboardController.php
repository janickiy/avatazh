<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Page;
use App\User;
use App\UserReview;
use App\Image;
use App\RequestCredit;
use App\RequestTradeIn;
use App\CatalogUsedCar;
use App\CarMark;

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
        $images = Image::all()->count();
        $requestcredits = RequestCredit::all()->count();
        $requesttradeins = RequestTradeIn::all()->count();
        $reviews = UserReview::all()->count();
        $carmarks = CarMark::all()->count();
        $catalogusedcars = CatalogUsedCar::all()->count();

        return view('admin.dashboard')->with(compact('users', 'packages', 'features', 'pages', 'posts', 'reviews', 'images', 'requestcredits', 'requesttradeins', 'catalogusedcars', 'carmarks'));
    }

    /**
     * @param Request $request
     * @param UserReview $userReview
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax(Request $request, UserReview $userReview)
    {
        if (isset($request->action)) {
            switch($request->action) {
                case 'approve':
                    $userReview->id = $request->id;
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
