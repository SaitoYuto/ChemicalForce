<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class AddCustomerRequest extends FormRequest
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
            'id' => 'required|string',
            'honorific' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'house_number' => 'required|string',
            'street' => 'required|string',
            'account' => 'required|numeric',
            'sales_rep_id' => 'required|string',
        ];
    }

    /**
     * Response when validation failed
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()->all(),
        ], Response::HTTP_BAD_REQUEST));
    }
}
