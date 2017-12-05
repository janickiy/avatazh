<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserReviewRequest;
use App\Http\Controllers\Controller;
use App\UserReview;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.review.index');
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
        return view('admin.review.create_edit')->with(compact('userReview'));
    }

    /**
     * @param UserReviewRequest $request
     * @param UserReview $userReview
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserReviewRequest $request, UserReview $userReview)
    {
        $userReview->author = $request->input('author');
        $userReview->message = $request->input('message');
        $userReview->published = $request->input('published');
        $userReview->save();

        return redirect('admin/review')->with('success', ' Отзыв обнавлен');
    }

    /**
     * @param Request $request
     * @param UserReview $userReview
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function destroy(Request $request, UserReview $userReview)
    {
        if ($request->ajax()) {
            $userReview->delete();
            return response()->json(['success' => 'Отзыв удален']);
        } else {
            return 'Вы не можете продолжить операцию удаления';
        }
    }
}
