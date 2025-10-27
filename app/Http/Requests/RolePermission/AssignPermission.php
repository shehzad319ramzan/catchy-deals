<?php

namespace App\Http\Requests\RolePermission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

class AssignPermission extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role' => ['required', 'integer', 'max:10', 'exists:roles,id'],
            'permission' => ['required', 'integer', 'max:10', 'exists:permissions,id'],
            'status' => ['required', 'string', 'max:10']
        ];
    }

    /**
     * @param Validator $Validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $Validator)
    {
        $Response = new Response(["errors" => $Validator->errors()], Response::HTTP_BAD_REQUEST);
        throw new ValidationException($Validator, $Response);
    }
}
