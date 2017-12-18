<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RequestTradeInsRequest;
use App\Http\Controllers\Controller;
use App\RequestTradeIn;

class RequestTradeInsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.requesttradeins.index');
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
     * @param RequestTradeIn $requesttradein
     * @return $this
     */
    public function edit(RequestTradeIn $requesttradein)
    {
        return view('admin.requesttradeins.create_edit')->with(compact('requesttradein'));
    }

    /**
     * @param RequestTradeinsRequest $request
     * @param RequestTradeIn $requestTradeIn
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RequestTradeInsRequest $request, RequestTradeIn $requestTradeIn)
    {
        $requestTradeIn->name = $request->input('name');
        $requestTradeIn->phone = $request->input('phone');
        $requestTradeIn->email = $request->input('email');
        $requestTradeIn->ip = $request->input('ip');
        $requestTradeIn->mark = $request->input('mark');
        $requestTradeIn->model = $request->input('model');
        $requestTradeIn->year = $request->input('year');
        $requestTradeIn->mileage = $request->input('mileage');
        $requestTradeIn->gearbox = $request->input('gearbox');
        $requestTradeIn->trade_in_mark = $request->input('trade_in_mark');
        $requestTradeIn->trade_in_model = $request->input('trade_in_model');
        $requestTradeIn->trade_in_year = $request->input('trade_in_year');
        $requestTradeIn->save();

        return redirect('admin/requesttradeins')->with('success', ' Отзыв обнавлен');
    }

    /**
     * @param Request $request
     * @param RequestTradeIn $requestTradeIn
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function destroy(Request $request, RequestTradeIn $requestTradeIn)
    {
        if ($request->ajax()) {
            $requestTradeIn->delete();
            return response()->json(['success' => 'Отзыв удален']);
        } else {
            return 'Ошибка веб приложения! Действия не были выполнены.';
        }
    }
}
