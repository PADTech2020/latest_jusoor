<?php

namespace Botble\Researchers\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Blog\Models\Post;
use Botble\Slider\Models\Slider;

class Researchers extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'researchers';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'position',
        'en_name',
        'en_position',
        'summary',
        'image',
        'type',
        'content',
        'order_num',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
    
    public static function getResearchers()
    {
        return Researchers::where(['status' => 1])->get();
    }

    public function getName(){
        if(app()->getLocale() == 'ar'){
            return $this->name;
        }else return $this->en_name;
    }
    public static function getALlResearchers()
    {
        return Researchers::where(['status'=>'1'])->pluck('name', 'id')->toArray();
    }

}
