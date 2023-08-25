<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanvienRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
//        return [
//            //
//        ];
        $rules = [];
        $method = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($method) {
                    case 'add':
                        $rules = [
                            'ten' => 'required',
                            'email' => 'required|email|unique:nhanvien',
                            'tel' => 'regex:/^\d{1,4}-\d{1,4}-\d{1,4}$/',
                            'max:14'
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'ten' => 'required',
                            'email' => 'required|email',
                            'tel' => 'regex:/^\d{1,4}-\d{1,4}-\d{1,4}$/',
                            'max:14'
                        ];
                        break;
                    default;
                        break;
                }
                break;
            default;
                break;
        }
        return $rules;
    }

}
