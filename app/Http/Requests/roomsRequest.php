<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class roomsRequest extends FormRequest
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
            'rent_amount'=>'required|numeric'
            ,'status'=>'required|string|in:maintenance,occupied,vacant',
            'type'=>'required|string',
            'room_number'=>'required|string|unique:rooms,room_number'
        ];
    }
}
