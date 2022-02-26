<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditWeight extends CreateWeights
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
            'weight' => 'required|numeric|max:300',
            'fat_percentage' => 'numeric|nullable|max:100',
            'muscle_weight' => 'numeric|nullable|max:100',
            'calorie_intake' => 'integer|nullable|max:4000',
        ];
    }

    public function attributes()
    {
        return parent::attributes();
    }
}
