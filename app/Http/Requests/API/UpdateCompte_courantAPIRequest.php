<?php

namespace App\Http\Requests\API;

use App\Models\Compte_courant;
use InfyOm\Generator\Request\APIRequest;

class UpdateCompte_courantAPIRequest extends APIRequest
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
        $rules = Compte_courant::$rules;
        
        return $rules;
    }
}
