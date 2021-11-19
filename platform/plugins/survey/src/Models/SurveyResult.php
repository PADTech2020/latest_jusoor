<?php

namespace Botble\Survey\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class SurveyResult extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'survey_results';

    /**
     * @var array
     */
    protected $fillable = [
        'survey_id',
        'answer',

    ];


}
