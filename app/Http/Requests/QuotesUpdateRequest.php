<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuotesUpdateRequest extends Request
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
        return [
            'id_coin'           => 'required',
            'id_coin_conversion'=> 'required',
            'coin'              => 'required',
            'type'              => 'required',
        ];
    }
}
