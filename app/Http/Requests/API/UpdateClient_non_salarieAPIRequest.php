<?php

namespace App\Http\Requests\API;

use App\Models\Client_non_salarie;
use InfyOm\Generator\Request\APIRequest;

class UpdateClient_non_salarieAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Client_non_salarie::$rules;
        
        return $rules;
    }
}
