<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateDuaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],

            'facebook' => ['string', 'max:255'],
            'instagram' => ['string', 'max:255'],
            'youtube' => ['string', 'max:255'],
            'tiktok' => ['string', 'max:255'],
            'website' => ['string', 'max:255'],
        ];
    }
}
