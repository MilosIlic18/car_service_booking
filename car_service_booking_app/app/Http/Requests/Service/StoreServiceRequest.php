<?php

namespace App\Http\Requests\Service;

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
        return array_merge($this->serviceRules(),$this->locationRules());
    }
    private function serviceRules(){
        return [
            'name'=>'required|unique:services,name',
            'description'=>'required',
        ];
    }
    private function locationRules(){
        return [
            'location.towns_id'=>'integer',
            'location.street'=>'required',
            'location.house_number'=>['required',
                Rule::unique('locations','house_number')->where(fn($query) =>
                    $query->where('towns_id', $this->input('location.towns_id'))
                          ->where('street', $this->input('location.street'))
                          ->where('house_number', $this->input('location.house_number'))
                ),
            ], 
        ];
    }
}
