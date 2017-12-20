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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogusedcars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalogusedcars.create_edit');
    }

    /**
     * @param CatalogUsedCarsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CatalogUsedCarsRequest $request)
    {
        $catalogUsedCar = CatalogUsedCar::create($request->except('_token'));
        $catalogUsedCar->save();

        return redirect('admin/catalogusedcars')->with('success', 'Новое меню добавлено успешно');
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
     * @param CatalogUsedCar $catalogusedcar
     * @return $this
     */
    public function edit(CatalogUsedCar $catalogusedcar)
    {
        return view('admin.catalogusedcars.create_edit')->with(compact('catalogusedcar'));
    }

    /**
     * @param CatalogUsedCarsRequest $request
     * @param CatalogUsedCar $catalogUsedCar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CatalogUsedCarsRequest $request, CatalogUsedCar $catalogUsedCar)
    {
        $catalogUsedCar->title = $request->input('title');

        $catalogUsedCar->save();

        return redirect('admin/catalogusedcars')->with('success', $catalogUsedCar->title . ' спешно добавлен в каталог');
    }

    /**
     * @param Request $request
     * @param CatalogUsedCar $catalogUsedCar
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function destroy(Request $request, CatalogUsedCar $catalogUsedCar)
    {
        if ($request->ajax()) {
            $catalogUsedCar->delete();
            return response()->json(['success' => 'Меню успешно удалено']);
        } else {
            return 'Вы не можете продолжить операцию удаления';
        }
    }
}
