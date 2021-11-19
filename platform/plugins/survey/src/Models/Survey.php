<?php

namespace Botble\Survey\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Survey extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'surveys';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'question',
        'type',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'start_date',
        'end_date',
        'home_page_only',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
