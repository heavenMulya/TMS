<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tenantRequest extends FormRequest
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
            'full_name'=>'required|string|max:255'
            ,'phone'=>'required|string|min:10',
            'email'=>'required|email|max:255',
            'id_number'=>'required|string',
            'room_id'=>'required|int',
            'lease_start'=>'required|string',
            'lease_end'=>'required|string',
        ];
    }
}
