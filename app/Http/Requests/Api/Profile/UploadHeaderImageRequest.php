<?php

namespace App\Http\Requests\Api\Profile;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UploadHeaderImageRequest extends FormRequest
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
            "header_image" => "required|image",
        ];
    }
}
