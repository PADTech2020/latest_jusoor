<?php

namespace Botble\Blog\Models;

use Botble\ACL\Models\User;
use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Researchers\Models\Researchers;
use Botble\Revision\RevisionableTrait;
use Botble\Slug\Traits\SlugTrait;
use Botble\Base\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Post extends BaseModel
{
    use RevisionableTrait;
    use SlugTrait;
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';
    public $timestamps = true;
    /**
     * @var mixed
     */
    protected $revisionEnabled = true;

    /**
     * @var mixed
     */
    protected $revisionCleanup = true;

    /**
     * @var int
     */
    protected $historyLimit = 20;

    /**
     * @var array
     */
    protected $dontKeepRevisionOf = [
        'content',
        'views',
    ];

    /**
     * The date fields for the model.clear
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'image',
        'images',
        'is_featured',
        'is_popular',
        'breaking_news',
        'trending',
        'format_type',
        'youtube_link',
        'status',
        'author_id',
        'researcher_id',
        'author_type',
        'published_at',

        'caption',
        'short_link',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    /**
     * @deprecated
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * @deprecated
     * @return BelongsTo
     */
    public function researcher(): BelongsTo
    {
        return $this->belongsTo(Researchers::class);
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }

    /**
     * @return BelongsToMany
     */
    public function circuits(): BelongsToMany
    {
        return $this->belongsToMany(\Botble\Circuit\Models\Circuit::class, 'post_circuits','post_id','circuit_id');
    }

    /**
     * @return MorphTo
     */
    public function author(): MorphTo
    {
        return $this->morphTo();
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Post $post) {
            $post->categories()->detach();
            $post->tags()->detach();
        });
    }


    public static function getPostShortLink($short_link)
    {
        return Post::where([
            'posts.status' => BaseStatusEnum::PUBLISHED,
            'posts.short_link' => $short_link,

        ])->where('id', '>', 0)
            ->limit(1)
            ->with(array_merge(['slugable'], []))
            ->orderBy('posts.created_at', 'desc')->first();
    }

    public function formattedCreatedDate() {
        if ($this->created_at->diffInDays() > 10) {
            return 'Created at '. $this->created_at->toFormattedDateString();
        } else {
            return 'Created ' . $this->created_at->diffForHumans();
        }
    }

}
