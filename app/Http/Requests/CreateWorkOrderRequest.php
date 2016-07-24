<?php

namespace Invoicing\Http\Requests;

use Invoicing\Http\Requests\Request;

class CreateWorkOrderRequest extends Request
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
            'scheduled' => 'date_format:Y-m-d',
            'description' => '',
            'rate' => 'required|integer'
        ];
    }
}
