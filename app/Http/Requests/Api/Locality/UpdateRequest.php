<?php

namespace App\Http\Requests\Api\Locality;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
        return [
            'name' => [
                'sometimes',
                'required',
                'max:50',
                Rule::unique('localities', 'name')->where('city_id', $this->city)->ignore($this->locality, 'id')
            ]
        ];
    }
}
