<?php

namespace Botble\Blog\Services;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Supports\Helper;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Blog\Repositories\Interfaces\CategoryInterface;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Blog\Repositories\Interfaces\TagInterface;
use Botble\SeoHelper\SeoOpenGraph;
use Botble\SeoHelper\SeoTwitter;
use Botble\SeoHelper\SeoMeta;
use Botble\SeoHelper\Entities\Twitter\Card;
use Eloquent;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use RvMedia;
use SeoHelper;
use Theme;

class BlogService
{
    /**
     * @param Eloquent $slug
     * @return array|Eloquent
     */
    public function handleFrontRoutes($slug)
    {
        if (!$slug instanceof Eloquent) {
           // mail("abdouta93@gmail.com","My handleFrontRoutes",URL::current());
            return $slug;
        }

        $condition = [
            'id'     => $slug->reference_id,
            'status' => BaseStatusEnum::PUBLISHED,
        ];

        if (Auth::check() && request()->input('preview')) {
            Arr::forget($condition, 'status');
        }

        switch ($slug->reference_type) {
            case Post::class:
                $post = app(PostInterface::class)
                    ->getFirstBy($condition, ['*'],
                        ['categories', 'tags', 'categories.slugable', 'tags.slugable']);

                if (empty($post)) {
                    abort(404);
                }

                $post->slugable = $slug;

                Helper::handleViewCount($post, 'viewed_post');

                SeoHelper::setTitle($post->name)
                    ->setDescription($post->description);

                $meta = new SeoOpenGraph;
                if ($post->image) {
                    $meta->setImage(RvMedia::getImageUrl($post->image));
                }
                $meta->setDescription($post->description);
                $meta->setUrl($post->url);
                $meta->setTitle($post->name);
                $meta->setType('article');
                $meta->addProperty('article:section', $post->categories->last()->name);
                $meta->addProperty('locale', 'ar_AR');
                $meta->addProperty('article:publisher', 'https://www.facebook.com/NEDAAPOST/');
                
                $twitter_meta = new seoTwitter;
                $twitter_meta->addImage(RvMedia::getImageUrl($post->image));
                $twitter_meta->setTitle( $post->name );
                $twitter_meta->setSite( '@NEDAAPOST' );
                $twitter_meta->setDescription( $post->description );
                $twitter_meta->addMeta('created-date',  date("Y/m/d", strtotime($post->published_at)) );
                $twitter_meta->addMeta('updated-date',  date("Y/m/d", strtotime($post->updated_at)) );
                $twitter_meta->addMeta('views-count',  $post->views.' ' );

                echo '<meta name="twitter:card" content="summary_large_image">';

                $seo_meta = new SeoMeta;
                $article_tags = '';
                if(!$post->tags->isEmpty()){
                    foreach ($post->tags as $tag){
                        $article_tags =  $article_tags.','.$tag->name;
                    }
                }
//                foreach(\Botble\Blog\Models\Post::getPostsForOthersLang($post->id) as $postR){
//                    $url=\Botble\Blog\Models\Post::find($postR->reference_id)->url;
//                    echo'<link rel="alternate" hreflang="'.$postR->lang_meta_code.'" href="'.$url.'">';
//                }



                $meta->addProperty('article:tag', $article_tags);
                $seo_meta->addMeta('article:tags', $article_tags );
                $seo_meta->addMeta('keywords', $article_tags );
                $seo_meta->addMeta('news_keywords', $article_tags );
                $seo_meta->addMeta('REVISION_DATE', $post->updated_at );

                SeoHelper::setSeoOpenGraph($meta);
                SeoHelper::setSeoMeta($seo_meta);
                SeoHelper::setSeoTwitter($twitter_meta);

                if (function_exists('admin_bar')) {
                    admin_bar()->registerLink(trans('plugins/blog::posts.edit_this_post'),
                        route('posts.edit', $post->id));
                }

                Theme::breadcrumb()
                    ->add(__('Home'), url('/'))
                    ->add($post->name, $post->url);

                do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, POST_MODULE_SCREEN_NAME, $post);

                return [
                    'view'         => 'post',
                    'default_view' => 'plugins/blog::themes.post',
                    'data'         => compact('post'),
                    'slug'         => $post->slug,
                ];
            case Category::class:
                $category = app(CategoryInterface::class)
                    ->getFirstBy($condition, ['*'], ['slugable']);

                if (empty($category)) {
                    abort(404);
                }

                $category->slugable = $slug;

                SeoHelper::setTitle($category->name)
                    ->setDescription($category->description);

                $meta = new SeoOpenGraph;
                if ($category->image) {
                    $meta->setImage(RvMedia::getImageUrl($category->image, 'post_main'));
                }
                $meta->setDescription($category->description);
                $meta->setUrl($category->url);
                $meta->setTitle($category->name);
                $meta->setType('article');

                SeoHelper::setSeoOpenGraph($meta);

                if (function_exists('admin_bar')) {
                    admin_bar()->registerLink(trans('plugins/blog::categories.edit_this_category'),
                        route('categories.edit', $category->id));
                }

                $allRelatedCategoryIds = array_unique(array_merge(
                    app(CategoryInterface::class)->getAllRelatedChildrenIds($category),
                    [$category->id]
                ));

                // $posts = app(PostInterface::class)
                //     ->getByCategory($allRelatedCategoryIds, theme_option('number_of_posts_in_a_category', 12));

                // Edited By Ahmad previuos version above
                $posts = app(PostInterface::class)
                    ->getByCategory([$category->id], theme_option('number_of_posts_in_a_category', 12));

                Theme::breadcrumb()
                    ->add(__('Home'), url('/'))
                    ->add($category->name, $category->url);

                do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, CATEGORY_MODULE_SCREEN_NAME, $category);

                return [
                    'view'         => 'category',
                    'default_view' => 'plugins/blog::themes.category',
                    'data'         => compact('category', 'posts'),
                    'slug'         => $category->slug,
                ];
            case Tag::class:
                $tag = app(TagInterface::class)->getFirstBy($condition);

                if (!$tag) {
                    abort(404);
                }

                $tag->slugable = $slug;

                SeoHelper::setTitle($tag->name)
                    ->setDescription($tag->description);

                $meta = new SeoOpenGraph;
                $meta->setDescription($tag->description);
                $meta->setUrl($tag->url);
                $meta->setTitle($tag->name);
                $meta->setType('article');

                if (function_exists('admin_bar')) {
                    admin_bar()->registerLink(trans('plugins/blog::tags.edit_this_tag'), route('tags.edit', $tag->id));
                }

                $posts = get_posts_by_tag($tag->id, theme_option('number_of_posts_in_a_tag'));

                Theme::breadcrumb()
                    ->add(__('Home'), url('/'))
                    ->add($tag->name, $tag->url);

                do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, TAG_MODULE_SCREEN_NAME, $tag);

                return [
                    'view'         => 'tag',
                    'default_view' => 'plugins/blog::themes.tag',
                    'data'         => compact('tag', 'posts'),
                    'slug'         => $tag->slug,
                ];
        }

        return $slug;
    }
}
