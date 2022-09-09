<?php

namespace App\Http\Requests;

use App\Rules\Availability;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => ['bail', 'required', 'date', 'after_or_equal:start_date', new Availability($this)]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O título não pode ficar em branco.',
            'start_date.required' => 'A data de início não pode ficar em branco.',
            'start_date.date' => 'Data inválida.',
            'end_date.required' => 'A data de fim não pode ficar em branco.',
            'end_date.date' => 'Data inválida.',
            'end_date.after_or_equal' => 'A data de fim não pode ser anterior à data de início.',
        ];
    }
}
