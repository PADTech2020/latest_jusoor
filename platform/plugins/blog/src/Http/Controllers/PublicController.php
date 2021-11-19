<?php

namespace Botble\Blog\Http\Controllers;

use Botble\Base\Supports\Helper;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Blog\Repositories\Interfaces\TagInterface;
use Botble\Blog\Services\BlogService;
use Illuminate\Support\Facades\Redirect;
use RvMedia;
use Botble\SeoHelper\SeoOpenGraph;
use Botble\Slug\Repositories\Interfaces\SlugInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Response;
use SeoHelper;
use SlugHelper;
use Theme;
use Botble\SeoHelper\Entities\Twitter\Card;
use Botble\SeoHelper\SeoTwitter;
use Botble\SeoHelper\SeoMeta;


class PublicController extends Controller
{

    /**
     * @var TagInterface
     */
    protected $tagRepository;

    /**
     * @var SlugInterface
     */
    protected $slugRepository;

    /**
     * PublicController constructor.
     * @param TagInterface $tagRepository
     * @param SlugInterface $slugRepository
     */
    public function __construct(TagInterface $tagRepository, SlugInterface $slugRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->slugRepository = $slugRepository;
    }

    /**
     * @param Request $request
     * @param PostInterface $postRepository
     * @return Response
     */
    public function getSearch(Request $request, PostInterface $postRepository)
    {
        $query = $request->input('q');
        SeoHelper::setTitle(__('Search result for: ') . '"' . $query . '"')
            ->setDescription(__('Search result for: ') . '"' . $query . '"');

        $posts = $postRepository->getSearch($query, 0, 12);

        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add(__('Search result for: ') . '"' . $query . '"', route('public.search'));

        return Theme::scope('search', compact('posts'))
            ->render();
    }

    /**
     * @param string $slug
     * @param Request $request
     * @return Response
     */
    public function getTag($slug, BlogService $blogService)
    {
        $slug = $this->slugRepository->getFirstBy([
            'key' => $slug,
            'prefix' => SlugHelper::getPrefix(Tag::class),
        ]);

        if (!$slug) {
            abort(404);
        }

        $data = $blogService->handleFrontRoutes($slug);

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }

    /**
     * @param string $slug
     * @param BlogService $blogService
     * @return Response
     */
    public function getPost($slug, BlogService $blogService)
    {
        $slug = $this->slugRepository->getFirstBy([
            'key' => $slug,
            'prefix' => SlugHelper::getPrefix(Post::class),
        ]);

        if (!$slug) {
            abort(404);
        }

        $data = $blogService->handleFrontRoutes($slug);

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }

    public function getPostByShortLink($short_link)
    {
        $post = Post::getPostShortLink($short_link);

        if (!$post) {
            abort(404);
        }
        
//        return redirect($post->slug);
        Helper::handleViewCount($post, 'viewed_post');

                SeoHelper::setTitle($post->name)
                    ->setDescription($post->description);

                echo '<title>'.$post->name.'</title>';
                echo '<meta name="description" content="'.$post->description.'">';
                

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

                $meta->addProperty('article:tag', $article_tags);
                $seo_meta->addMeta('article:tags', $article_tags );
                $seo_meta->addMeta('keywords', $article_tags );
                $seo_meta->addMeta('news_keywords', $article_tags );
                $seo_meta->addMeta('REVISION_DATE', $post->updated_at );

                SeoHelper::setSeoOpenGraph($meta);
                SeoHelper::setSeoMeta($seo_meta);
                SeoHelper::setSeoTwitter($twitter_meta);

        $data = [
            'view' => 'post',
            'default_view' => 'plugins/blog::themes.post',
            'data' => compact('post'),
            'slug' => $post->slug,//$Post->slug,
        ];

        // return  Redirect::away('/'.$post->slug);


        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }


    /**
     * @param string $slug
     * @param BlogService $blogService
     * @return Response
     */
    public function getCategory($slug, BlogService $blogService)
    {
        $slug = $this->slugRepository->getFirstBy([
            'key' => $slug,
            'prefix' => SlugHelper::getPrefix(Category::class),
        ]);

        if (!$slug) {
            abort(404);
        }

        $data = $blogService->handleFrontRoutes($slug);

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }
}
