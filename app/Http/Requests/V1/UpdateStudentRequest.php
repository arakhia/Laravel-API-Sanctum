<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method == 'PUT'){
            return [
                'name' => ['required'],
                'email' => ['required', 'email'],
                // TODO
                // To complete validation for all fields
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email'],
                // TODO
                // To complete validation for all fields
            ];
        }
        
    }
}
