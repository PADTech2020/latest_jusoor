<?php

namespace Botble\Slider\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Support\Facades\DB;

class Slider extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sliders';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'content',
        'url',
        'category',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public static function getSlider($count){
        $lang='ar';
        if(app()->getLocale()=='en'){
            $lang='en_US';
        }elseif (app()->getLocale()=='tr'){
            $lang='tr_TR';
        }
        return Slider::select('*')
            ->join('language_meta', function ($join) {
                $join->on('language_meta.reference_id', '=', 'sliders.id');
            })
            ->where([
                'language_meta.reference_type' => Slider::class,
                'language_meta.lang_meta_code' =>$lang ,
                'sliders.status' => 'published'])->orderBy('sliders.created_at', 'DESC')->limit($count)->get();
    }
}
