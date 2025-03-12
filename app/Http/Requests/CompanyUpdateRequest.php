<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
        $companyId = auth()->check() && auth()->user()->company
            ? auth()->user()->company->id
            : $this->route('id');

        return [
            'name' => 'sometimes|string|max:255',
            'director_full_name' => 'sometimes|string|max:255',
            'address' => 'sometimes|string',
            'email' => 'sometimes|email|unique:companies,email,' . $companyId,
            'website' => 'sometimes|url',
            'phone' => 'sometimes|string|max:20'
        ];
    }
}
