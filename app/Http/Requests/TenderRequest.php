<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TenderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|max:200',
            'description' => 'required|max:1000',
            'price'       => '',
            'name'        => 'required|max:200',
            'email'       => 'required|email|max:300',
            'phone'       => 'required|max:200',
            'city'        => 'required',
            'tags'        => 'required|array',
        ];
    }
}
