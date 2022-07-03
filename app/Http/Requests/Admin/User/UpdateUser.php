<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.user.edit', $this->user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => ['sometimes', 'string'],
            'last_name' => ['nullable', 'string'],
            'email' => ['sometimes', 'email', Rule::unique('users', 'email')->ignore($this->user->getKey(), $this->user->getKeyName()), 'string'],
            'mobile_number' => ['nullable', 'string'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['sometimes', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            'role_id' => ['sometimes', 'integer'],
            'status' => ['sometimes', 'boolean'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
