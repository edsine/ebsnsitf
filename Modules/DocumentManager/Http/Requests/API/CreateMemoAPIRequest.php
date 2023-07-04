<?php

namespace Modules\DocumentManager\Http\Requests\API;

use Modules\DocumentManager\Models\Memo;
use InfyOm\Generator\Request\APIRequest;

class CreateMemoAPIRequest extends APIRequest
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
        return Memo::$rules;
    }
}
