<?php

namespace App\Http\Requests\service;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'                  => 'required|string|unique:services,name',
            'description'           => 'required|string',
            'location.towns_id'     => 'required|integer',
            'location.street'       => 'required|string',
            'location.house_number' => ['required',Rule::unique('locations', 'house_number')
                                        ->where(function ($query){
                                            return $query->where('towns_id', $this->input('location.towns_id'))
                                                        ->where('street', $this->input('location.street'));
                                            })
                                        ]
        ];
    }
}
