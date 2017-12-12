<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CarModelsRequest;
use App\Http\Controllers\Controller;
use App\CarModel;

class CarmodelsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.carmarks.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return $this->index();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.carmodels.create_edit');
    }

    /**
     * @param CarModel $carmodel
     * @return $this
     */
    public function edit(CarModel $carmodel)
    {
        return view('admin.carmodels.create_edit')->with(compact('carmodel'));
    }

    /**
     * @param CarModelsRequest $request
     * @param CarModel $carModel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CarModelsRequest $request, CarModel $carModel)
    {
        $carModel->name = $request->input('name');
        $carModel->id_car_type = 1;
        $carModel->name_rus = $request->input('name_rus');
        $carModel->id_car_mark = $request->input('id_car_mark');
        $carModel->published = $request->input('published');
        $carModel->save();

        return redirect('admin/carmodels')->with('success', 'Данные обнавлены');
    }

    /**
     * @param CarModelsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CarModelsRequest $request)
    {
        $carmodel = CarModel::create($request->except('_token'));
        $carmodel->save();

        return redirect('admin/carmarks')->with('success', ' добавлена');
    }

    /**
     * @param Request $request
     * @param CarModel $carModel
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function destroy(Request $request, CarModel $carModel)
    {
        if ($request->ajax()) {
            $carModel->delete();
            return response()->json(['success' => 'Модель удалена']);
        } else {
            return 'Ошибка веб приложения! Действия не были выполнены.';
        }
    }
}
