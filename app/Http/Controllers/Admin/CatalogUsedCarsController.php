<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CatalogUsedCarsRequest;
use App\Http\Controllers\Controller;
use App\CatalogUsedCar;

class CatalogUsedCarsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.catalogusedcars.index');
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
        return view('admin.catalogusedcars.create_edit');
    }

    /**
     * @param CarMark $carMark
     * @return $this
     */
    public function edit(CatalogUsedCar $carmark)
    {
        return view('admin.catalogusedcars.create_edit')->with(compact('carmark'));
    }

    /**
     * @param CarMarksRequest $request
     * @param CarMark $carMark
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CatalogUsedCarsRequest $request, CatalogUsedCar $catalogUsedCar)
    {
        $catalogUsedCar->mark = trim($request->input('mark'));
        $catalogUsedCar->model = trim($request->input('model'));
        $catalogUsedCar->price = $request->input('price');
        $catalogUsedCar->year = $request->input('year');
        $catalogUsedCar->mileage = $request->input('mileage');
        $catalogUsedCar->gearbox = trim($request->input('gearbox'));
        $catalogUsedCar->drive = trim($request->input('drive'));
        $catalogUsedCar->drive = trim($request->input('engine_type'));
        $catalogUsedCar->power = $request->input('power');
        $catalogUsedCar->body = trim($request->input('body'));
        $catalogUsedCar->wheel = trim($request->input('color'));
        $catalogUsedCar->salon = trim($request->input('salon'));
        $catalogUsedCar->meta_title = trim($request->input('meta_title'));
        $catalogUsedCar->meta_keywords = trim($request->input('meta_keywords'));
     	$catalogUsedCar->meta_description = trim('description');
        $catalogUsedCar->published = $request->input('published');
        $catalogUsedCar->save();

        return redirect('admin/catalogusedcars')->with('success', 'Данные обнавлены');
    }

    /**
     * @param CarMarksRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CatalogUsedCarsRequest $request)
    {
        $catalogUsedCar = CatalogUsedCar::create($request->except('_token'));
        $catalogUsedCar->save();
        return redirect('admin/catalogusedcars')->with('success', 'Автомобиль добавлен');
    }

    /**
     * @param Request $request
     * @param CarMark $carMark
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function destroy(Request $request, CatalogUsedCar $catalogUsedCar)
    {
        if ($request->ajax()) {
            $catalogUsedCar->delete();
            return response()->json(['success' => 'Автомобиль удалён']);
        } else {
            return 'Ошибка веб приложения! Действия не были выполнены.';
        }
    }
}
