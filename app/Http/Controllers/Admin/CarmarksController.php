<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CarMarksRequest;
use App\Http\Requests\CarMarksImportRequest;
use App\Http\Controllers\Controller;
use App\Helpers\TextHelper;
use App\CarMark;
use App\CarModel;
use App\CarModification;

class CarmarksController extends Controller
{
    const IDCARTYPE = 1;

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
        return view('admin.carmarks.create_edit');
    }

    /**
     * @param CarMark $carMark
     * @return $this
     */
    public function edit(CarMark $carmark)
    {
        return view('admin.carmarks.create_edit')->with(compact('carmark'));
    }

    /**
     * @param CarMarksRequest $request
     * @param CarMark $carMark
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CarMarksRequest $request, CarMark $carMark)
    {
        $carMark->name = $request->input('name');
        $carMark->id_car_type = self::IDCARTYPE;
        $carMark->name_rus = $request->input('name_rus');
        $carMark->published = $request->input('published');
        $carMark->save();

        return redirect('admin/carmarks')->with('success', 'Данные обнавлены');
    }

    /**
     * @param CarMarksRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CarMarksRequest $request)
    {
        $carmark = CarMark::create($request->except('_token'));
        $carmark->save();

        return redirect('admin/carmarks')->with('success', ' добавлена');
    }

    /**
     * @param Request $request
     * @param CarMark $carMark
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function destroy(Request $request, CarMark $carMark)
    {
        if ($request->ajax()) {
            $carMark->delete();
            return response()->json(['success' => 'Марка удалена']);
        } else {
            return 'Ошибка веб приложения! Действия не были выполнены.';
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function import()
    {
        return view('admin.carmarks.import');
    }

    /**
     * @param CarMarksImportRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function imporCarmarks(CarMarksImportRequest $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $xml = simplexml_load_file($file);

            if ($xml) {
                CarMark::query()->truncate();
                CarModel::query()->truncate();
                CarModification::query()->truncate();
            }

            foreach($xml->mark as $row_mark) {
                if ($row_mark->code) {
                    $carMarks = new CarMark;
                    $carMarks->name = TextHelper::formatMarkNames($row_mark->code);
                    $carMarks->name_rus = TextHelper::formatMarkNames(TextHelper::Lat2ru($row_mark->code));
                    $carMarks->id_car_type = self::IDCARTYPE;
                    $carMarks->published = 1;

                    if ($carMarks->save()) {
                        $id_car_mark = $carMarks->id;

                        foreach($row_mark->folder as $row_folder){
                            $carModel = new CarModel;
                            $carModel->id_car_mark = $id_car_mark;
                            $carModel->id_car_type = self::IDCARTYPE;
                            $carModel->name = $row_folder[0]['name'];
                            $carModel->name_rus = TextHelper::Lat2ru($row_folder[0]['name']);
                            $carModel->published  = 1;

                            if ($carModel->save()) {
                                $id_car_model = $carModel->id;
                                $carModification = new CarModification;
                                $carModification->id_car_model = $id_car_model;
                                $carModification->name = $row_folder->modification->modification_id[0];
                                $carModification->body_type = $row_folder->modification->body_type[0];
                                $carModification->id_car_type = self::IDCARTYPE;
                                $years = $row_folder->modification->years[0];

                                preg_match('/(\d+)\s+-\s(\d+)$/', $years, $matches);

                                $carModification->year_begin = isset($matches[1]) ? $matches[1] : 0;
                                $carModification->year_end = isset($matches[2]) ? $matches[2] : 0;
                                $carModification->save();
                            }
                        }
                    }
                }
            }
        }

        return redirect('admin/carmarks/import')->with('success', 'Импорт завершен');
    }
}