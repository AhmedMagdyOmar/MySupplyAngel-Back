<?php

namespace App\Http\Requests\Api\Dashboard\Package;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PackageRequest extends FormRequest
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
            'title' => 'required|string|min:2',
            'desc'  => 'required|string|min:2',
            'note'  => 'required|string|min:2',
            'price' => 'required',
            'duration_by_month' => 'required',
            'type'  => 'required|string|in:free,supplier_package,package_agents_and_distributors,package_inclusive'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'  => false,
            'data'    => null,
            'message' => $validator->messages()->first(),
        ], 422));
    }
}
