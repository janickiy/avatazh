<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserReviewRequest;
use App\Http\Controllers\Controller;
use App\UserReview;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->index();
    }

    /**
     * @param UserReview $userReview
     * @return $this
     */
    public function edit(UserReview $userReview)
    {
        return view('admin.reviews.create_edit')->with(compact('userReview'));
    }

    /**
     * @param UserReviewRequest $request
     * @param UserReview $userReview
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserReviewsRequest $request, UserReview $userReviews)
    {
        $userReviews->author = $request->input('author');
        $userReviews->author = $request->input('author');
        $userReviews->message = $request->input('message');
        $userReviews->published = $request->input('published');
        $userReviews->save();

        return redirect('admin/reviews')->with('success', ' Отзыв обнавлен');
    }

    /**
     * @param Request $request
     * @param UserReview $userReview
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function destroy(Request $request, UserReview $userReviews)
    {
        if ($request->ajax()) {
            $userReviews->delete();
            return response()->json(['success' => 'Отзыв удален']);
        } else {
            return 'Вы не можете продолжить операцию удаления';
        }
    }
}
