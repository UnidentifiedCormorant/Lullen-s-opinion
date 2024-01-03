<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StageRequest extends FormRequest
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
            "selection_0_1" => 'required',
            "rate_0_1" => 'required',
            "selection_0_2" => 'required',
            "rate_0_2" => 'required',
            "selection_0_3" => 'required',
            "rate_0_3" => 'required',
            "selection_0_4" => 'required',
            "rate_0_4" => 'required',
            "selection_1_2" => 'required',
            "rate_1_2" => 'required',
            "selection_1_3" => 'required',
            "rate_1_3" => 'required',
            "selection_1_4" => 'required',
            "rate_1_4" => 'required',
            "selection_2_3" => 'required',
            "rate_2_3" => 'required',
            "selection_2_4" => 'required',
            "rate_2_4" => 'required',
            "selection_3_4" => 'required',
            "rate_3_4" => 'required',
        ];
    }
}
