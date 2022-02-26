<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\User;

class CreateWeights extends FormRequest
{
    /* *
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /* *
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => ['required','date','before_or_equal:today',Rule::unique('weights')->where(function ($query) {
                    $user  = Auth::user();
                    return $query->where('user_id', $user->id);
                }),
        ],
            'weight' => 'required|numeric|max:300',
            'fat_percentage' => 'numeric|nullable|max:100',
            'muscle_weight' => 'numeric|nullable|max:100',
            'calorie_intake' => 'integer|nullable|max:4000',
        ];
    }

    public function attributes()
    {
        return [
            'date' => '日付',
            'weight' => '体重',
            'fat_percentage' => '体脂肪率',
            'muscle_weight' => '筋肉量',
            'calorie_intake' => '摂取カロリー'
        ];
    }
}
