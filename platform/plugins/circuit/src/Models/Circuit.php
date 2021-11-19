<?php

namespace Botble\Circuit\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Botble\Slug\Traits\SlugTrait;

class Circuit extends BaseModel
{
    use SlugTrait;
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'circuits';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'desc',
        'status',
        'parent_id',
        'is_default',
        'order',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Circuit::class, 'parent_id')->withDefault();
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Circuit::class, 'parent_id');
    }

    /**
     * @return BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_circuits')->with('slugable');
    }

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (Circuit $circuit) {
            Circuit::where('parent_id', $circuit->id)->delete();

            $circuit->posts()->detach();
        });
    }
    
}
