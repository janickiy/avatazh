<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Page;
use App\CarMark;
use App\CarModel;
use App\CarModification;
use App\UserReview;

class FrontendController extends Controller
{
    public function index()
    {
        $marks = CarMark::where('published', 1)
            ->take(23)
            ->get();

        $data = [
            'marks' => $marks,
        ];

        return view('frontend.index', $data)->with('title', 'Главная');
    }

    public function components()
    {
        return view('frontend.components');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contactUsSubmit(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $form_message = $request->input('message');
        $to_email = \Config::get('app.contact_email');

        \Mail::send('emails.contact',
            [
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'form_message' => $form_message
            ],
            function ($message) use ($to_email) {
                $message->to($to_email, getSetting('SITE_TITLE') . ' Поддержка')->subject('Сообщение из формы контактов');
            }
        );

        return redirect('/login')->with(['success' => 'Спасибо что связались с нами!']);
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function post($slug = '')
    {
        $post = Page::whereSlug($slug)->published()->post()->get()->first();
        if ($post) {
            return view('frontend.post')->with(compact('post'));
        }

        abort(404);
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function staticPages($slug = '')
    {
        $page = Page::whereSlug($slug)->published()->page()->get()->first();

        if ($page) {
            return view('frontend.page')->with(compact('page'));
        }

        abort(404);
    }

    public function ajax(Request $request)
    {

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reviews()
    {
        $marks = CarMark::where('published', 1)
            ->take(23)
            ->get();

        $data = [
            'marks' => $marks,
            'reviews' => UserReview::where('published', 1)->paginate(5),
        ];

        return view('frontend.reviews', $data)->with(['title' => 'Отзывы']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reviewsSubmit(Request $request)
    {
        $author = trim($request->input('author'));
        $email = trim($request->input('email'));
        $message = trim($request->input('message'));

        $userReview = new UserReview();
        $userReview->author = $author;
        $userReview->email = $email;
        $userReview->message = $message;
        $userReview->published = 0;
        $userReview->save();

        return redirect('/reviews')->with(['success' => 'Ваш коментарий отправлен. После проверки модератора он будет доступен!']);
    }


    public function auto()
    {
        return view('frontend.auto')->with('title', 'Автомобили с пробегом');
    }

    public function credit()
    {
        $marks = CarMark::where('published', 1)
            ->take(23)
            ->get();

        $data = [
            'marks' => $marks,
        ];

        return view('frontend.credit', $data)->with('title', 'Автокредит');
    }

    public function tradeIn()
    {
        $marks = CarMark::where('published', 1)
            ->take(23)
            ->get();

        $data = [
            'marks' => $marks ,
        ];

        return view('frontend.tradein', $data)->with('title', 'Trade-in');
    }

    public function contact()
    {
        $marks = CarMark::where('published', 1)
            ->take(23)
            ->get();

        $data = [
            'marks' => $marks ,
        ];

        return view('frontend.contact', $data)->with('title', 'Контакты');
    }
}
