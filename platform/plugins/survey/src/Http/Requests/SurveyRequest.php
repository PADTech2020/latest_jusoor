<?php

namespace Botble\Survey\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class SurveyRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'required',
            'question'   => 'required',
            'start_date'   => 'required',
            'end_date'   => 'required',

            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
