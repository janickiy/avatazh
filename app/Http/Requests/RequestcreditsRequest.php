<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestCreditsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'mark' => 'required',
                    'model' => 'required',
                    'car_equipments' => 'required',
                    'initial_payment' => 'required|numeric',
                    'name' => 'required',
                    'age' => 'required|numeric',
                    'registration' => 'required',
                    'phone' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'mark' => 'required',
                    'model' => 'required',
                    'car_equipments' => 'required',
                    'initial_payment' => 'required|numeric',
                    'name' => 'required',
                    'age' => 'required|numeric',
                    'registration' => 'required',
                    'phone' => 'required',
                ];
            }
            default:
                break;
        }
        return [
            //
        ];
    }
}
