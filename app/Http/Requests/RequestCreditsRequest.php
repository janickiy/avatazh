<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestCreditsRequest extends Request
{

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
                    'modification' => 'required',
                    'fee' => 'required|numeric',
                    'name' => 'required',
                    'age' => 'required|numeric',
                    'registration' => 'required',
                    'phone' => 'required',
                    'email' => 'email',
                    'confirmation' => 'required',
                    'agree' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'mark' => 'required',
                    'model' => 'required',
                    'modification' => 'required',
                    'fee' => 'required|numeric',
                    'name' => 'required',
                    'age' => 'required|numeric',
                    'registration' => 'required',
                    'phone' => 'required',
                    'email' => 'email',
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
