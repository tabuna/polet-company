<?php

namespace App\Http\Requests\Profile;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Guard $guard
     *
     * @return bool
     */
    public function authorize(Guard $guard)
    {
        return $guard->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'           => 'required|max:255',
            //'email'        => 'email|required|unique:users,email,' . Auth::user()->id,
            //'avatar'       => 'mimes:jpeg,bmp,png|sometimes',
            'website'        => 'sometimes|max:255',
            'about'          => 'sometimes|max:65000',
            'notification'   => 'sometimes|boolean',
            'phone'          => 'sometimes|max:255',
            'address'        => 'sometimes|required|max:255',
            'inn'            => 'sometimes|required|max:12',
            'ogrn'           => 'sometimes|required|max:15',
            'agent_name'     => 'required|max:255',
            'specialization' => 'sometimes|max:255',
            'size_company'   => 'sometimes|max:255',
            'tags'           => 'sometimes',
            'city_id'        => 'integer|required',
        ];
    }
}
