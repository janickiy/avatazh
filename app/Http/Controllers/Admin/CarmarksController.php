<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CarMarksRequest;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\CarMark;
use Illuminate\Support\Facades\DB;

class CarmarksController extends Controller
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
        $carMark->id_car_type = 1;
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

    public function imporCarmarks(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');




            //$xml = XmlParser::load($file);

            $xml = simplexml_load_file($file);

          //  dd($xml->mark->folder);

foreach($xml->mark as $row_folder) {





    if ($row_folder->code) {
        // echo $folder->code;

        $flight = new CarMark;

        //$flight->id = 0;
        $flight->name = $row_folder->code;
        $flight->name_rus = $row_folder->code;
        $flight->id_car_type = 1;
        $flight->published  = 0;
        $flight->save();

      //  CarMark::( array('name' => $row_folder->code, 'name_rus' => $row_folder->code, 'id' => 0, 'id_car_type' => 1, 'published' => 1));




      //  echo '<br>';

        foreach($row_folder->folder as $row_model) {
            // dd($model);
            foreach($row_model->modification as $modification) {
             //   echo $modification->modification_id;
                // dd($modification);
            //    echo '<br>';
            }

        }
    }


//dd($folder->code);
}




        }



    }
}
