<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RequestCreditsRequest;
use App\Http\Controllers\Controller;
use App\RequestCredit;

class RequestCreditsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.requestcredits.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->index();
    }

    /**
     * @param RequestCredit $requestcredit
     * @return $this
     */
    public function edit(RequestCredit $requestcredit)
    {
       /// dd($review);
        return view('admin.requestcredits.create_edit')->with(compact('requestcredit'));
    }

    /**
     * @param RequestCreditsRequest $request
     * @param RequestCredit $requestCredit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RequestCreditsRequest $request, RequestCredit $requestCredit)
    {
        $requestCredit->name = $request->input('name');
        $requestCredit->phone = $request->input('phone');
        $requestCredit->email = $request->input('email');
        $requestCredit->ip = $request->input('ip');
        $requestCredit->mark = $request->input('mark');
        $requestCredit->model = $request->input('model');
        $requestCredit->year = $request->input('year');
        $requestCredit->mileage = $request->input('mileage');
        $requestCredit->gearbox = $request->input('gearbox');
        $requestCredit->trade_in_mark = $request->input('trade_in_mark');
        $requestCredit->trade_in_model = $request->input('trade_in_model');
        $requestCredit->trade_in_year = $request->input('trade_in_year');
        $requestCredit->save();

        return redirect('admin/requestcredits')->with('success', ' Отзыв обнавлен');
    }

    /**
     * @param Request $request
     * @param RequestCredit $requestCredit
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function destroy(Request $request, RequestCredit $requestCredit)
    {
        if ($request->ajax()) {
            $requestCredit->delete();
            return response()->json(['success' => 'Отзыв удален']);
        } else {
            return 'Ошибка веб приложения! Действия не были выполнены.';
        }
    }
}
