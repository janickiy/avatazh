<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RequestCreditsRequest;
use App\Http\Requests\RequestTradeInsRequest;
use App\Page;
use App\CarMark;
use App\CarModel;
use App\CarModification;
use App\UserReview;
use App\GeoRegion;
use App\RequestCredit;
use App\RequestTradeIn;

class FrontendController extends Controller
{
    public function index()
    {
        $marks = CarMark::where('published', 1)
            ->take(23)
            ->get();

        return view('frontend.index', compact('marks'))->with('title', 'Главная');
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax(Request $request)
    {
        if (isset($request->action)) {
            switch($request->action) {
                case 'search_mark':

                    $search_mark = trim(strip_tags(stripcslashes(htmlspecialchars($request->mark))));

                    $marks = CarMark::where('published', 1)
                    ->where('name', 'LIKE', '%' . $search_mark . '%')->get();

                    $rows = [];

                    foreach($marks as $mark) {
                        $rows[] = [
                            "id" => $mark->id,
                            "name" => $mark->name,
                            "name_rus" => $mark->name_rus,
                            "slug" => $mark->slug,
                        ];
                    }

                    return response()->json(['item' => $rows]);

                    break;

                case 'search_model':

                    $search_model = trim(strip_tags(stripcslashes(htmlspecialchars($request->model))));

                    $models = CarModel::where('published', 1)
                        ->where('id_car_mark', $request->id_car_mark)
                        ->where('name', 'LIKE', '%' . $search_model . '%')
                        ->get();

                    $rows = [];

                    foreach($models as $model) {
                        $rows[] = [
                            "id"   => $model->id,
                            "name" => $model->name,
                            "name_rus" => $model->name_rus,
                            "slug" => $model->slug,
                        ];
                    }

                    return response()->json(['item' => $rows]);

                    break;

                case 'get_modifications':

                    $modifications = CarModification::where('id_car_model', $request->id_car_model)
                        ->get();

                    $rows = [];

                    foreach($modifications as $modification) {
                        $rows[] = [
                            "id" => $modification->id,
                            "name" => $modification->name,
                            "body_type" => $modification->body_type,
                            "year_begin" => $modification->year_begin,
                            "year_end" => $modification->year_end,
                        ];
                    }

                    return response()->json(['item' => $rows]);

                    break;

                case 'get_models':

                    $models = CarModel::where('published', 1)
                        ->where('id_car_mark', $request->id_car_mark)
                        ->get();

                    $rows = [];

                    foreach($models as $model) {
                        $rows[] = [
                            "id"   => $model->id,
                            "name" => $model->name,
                            "name_rus" => $model->name_rus,
                            "slug" => $model->slug,
                        ];
                    }

                    return response()->json(['item' => $rows]);

                    break;

                case 'search_registration':

                    $search_region = trim(strip_tags(stripcslashes(htmlspecialchars($request->registration))));

                    $regions = GeoRegion::where('id_country', 149)
                        ->where('name_ru', 'LIKE', '%' .  $search_region . '%')
                        ->get();

                    $rows = [];

                    foreach($regions as $region) {
                        $rows[] = [
                            "id"   => $region->id,
                            "name" => $region->name_ru,
                        ];
                    }

                    return response()->json(['item' => $rows]);

                    break;
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reviews()
    {
        $marks = CarMark::where('published', 1)
            ->take(23)
            ->get();

        $reviews = UserReview::where('published', 1)
            ->paginate(5);

        return view('frontend.reviews', compact('marks','reviews'))->with(['title' => 'Отзывы']);
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


    public function allUsedAuto()
    {
        return view('frontend.auto')->with('title', 'Автомобили с пробегом');
    }

    public function credit()
    {
        $marks = CarMark::where('published', 1)
            ->take(23)
            ->get();

        return view('frontend.credit', compact('marks'))->with('title', 'Автокредит');
    }

    /**
     * @param RequestCreditsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function requestCredit(RequestCreditsRequest $request)
    {
        $request->request->remove('id_mark');
        $request->request->remove('id_model');
        $request->request->remove('confirmation');
        $request->request->remove('agree');

        $requestCredit = RequestCredit::create($request->except('_token'));
        $requestCredit->save();
        return redirect('/credit')->with('success', 'Ваша заявка на автокредит отправлена. Мы свяжемся с Вами в ближайшее время!');
    }

    public function tradeIn()
    {
        $marks = CarMark::where('published', 1)
            ->take(23)
            ->get();

        return view('frontend.tradein', compact('marks'))->with('title', 'Trade-in');
    }

    /**
     * @param RequestTradeInsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function requestTradein(RequestTradeInsRequest $request)
    {
        $request->request->remove('id_mark');
        $request->request->remove('id_model');
        $request->request->remove('id_trade_in_mark');
        $request->request->remove('id_trade_in_model');
        $request->request->remove('confirmation');
        $request->request->remove('agree');

        $requestTradeIn = RequestTradeIn::create($request->except('_token'));
        $requestTradeIn->save();
        return redirect('/tradein')->with('success', 'Ваша заявка на Trade-In отправлена. Мы свяжемся с Вами в ближайшее время!');
    }

    public function contact()
    {
        $marks = CarMark::where('published', 1)
            ->take(23)
            ->get();

        return view('frontend.contact', compact('marks'))->with('title', 'Контакты');
    }

    public function allmarks()
    {
        $marks = CarMark::all()->where('published', 1);

        return view('frontend.allmarks', compact('marks'))->with('title', 'Все марки');
    }

    /**
     * @param $mark
     * @return $this
     */
    public function usedAuto($mark)
    {
        $models = CarModel::select(['car_models.name', 'car_models.slug as model', 'car_marks.slug as mark'])
        ->where('car_models.published', 1)
                    ->join('car_marks', 'car_marks.id', '=', 'car_models.id_car_mark')
                    ->where('car_marks.slug', $mark)
                    ->get();

        return view('frontend.usedauto.mark', compact('models'))->with('title', 'Все модели: ' . $mark);
    }

    /**
     * @param $mark
     * @param $model
     * @return $this
     */
    public function usedAutoModel($model)
    {
        $modifications = CarModel::select(['car_modifications.id','car_modifications.name','car_modifications.body_type'])
            ->join('car_modifications', 'car_models.id', '=', 'car_modifications.id_car_model')
            ->where('car_models.slug', $model)
            ->get();

        return view('frontend.usedauto.model', compact('modifications'))->with('title', 'Автомобили с пробегом');
    }
}
