<?php

namespace Modules\Auth\Http\Requests;

use App\Traits\AsTDO;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use AsTDO;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required'],
            'password' => ['required','string'] 
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
