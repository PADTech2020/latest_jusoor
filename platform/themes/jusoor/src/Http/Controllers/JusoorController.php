<?php

namespace Theme\Jusoor\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Theme\Http\Controllers\PublicController;
use Botble\Blog\Models\Post;
use Botble\Researchers\Models\Researchers;
use Theme;
use SeoHelper;
use Botble\SeoHelper\SeoOpenGraph;
use Botble\SeoHelper\SeoTwitter;
use RvMedia;

class JusoorController extends PublicController
{
    /**
     * {@inheritDoc}
     */
    public function getIndex()
    {
        return parent::getIndex();
    }

//    /**
//     * {@inheritDoc}
//     */
//    public function getView(BaseHttpResponse $response, $key = null)
//    {
//        return parent::getView($response, $key);
//    }

    /**
     * {@inheritDoc}
     */
    public function getSiteMap()
    {
        return parent::getSiteMap();
    }
    public function home2()
    {
        return \Theme::layout('home2')->scope('home2')->render();
    }
    public function contact()
    {
        SeoHelper::setTitle('تواصل معنا في جسور للدراسات')
                    ->setDescription('');
        return \Theme::layout('home2')->scope('contact')->render();
    }

    public function postsForResearchers($id)
    {
        // Posts of reseaarcher.
        $posts = Post::join("language_meta", function ($join) {
            $join->on("language_meta.reference_id", "=", "id")
                ->where(["language_meta.reference_type"=> 'Botble\Blog\Models\Post','language_meta.lang_meta_code'=>'ar']);
        })->where(['status' => BaseStatusEnum::PUBLISHED(), 'researcher_id' => $id])->paginate(8);

        // Researcher Details.
        $researcher = Researchers::find($id);

        if (!$researcher) {
            abort(404);
        }
            
        if(isset($researcher)){
            SeoHelper::setTitle('الكاتب '.$researcher->name)
                        ->setDescription($researcher->summary);
            $meta = new SeoOpenGraph;
            if ($researcher->image) {
                $meta->setImage(RvMedia::getImageUrl($researcher->image));
            }
            $twitter_meta = new seoTwitter;
            $twitter_meta->addImage(RvMedia::getImageUrl($researcher->image));
            $twitter_meta->setTitle('الكاتب '.$researcher->name);
            $twitter_meta->setDescription($researcher->summary);
            echo '<meta name="twitter:card" content="summary_large_image">';

            SeoHelper::setSeoOpenGraph($meta);
            SeoHelper::setSeoTwitter($twitter_meta);
        }

        return Theme::scope('posts_researchers', ['posts' => $posts, 'researcher' => $researcher])->render();
    }

    public function aboutPage()
    {
        SeoHelper::setTitle('نحن في جسور للدراسات')
                    ->setDescription('');

        return Theme::scope('about')->render();
    }

    public function researchersPage()
    {
        SeoHelper::setTitle('جسور للدراسات | الكُتٌَاب')
                    ->setDescription('قائمة الكتاب في موقع جسور للدراسات');
        $researchers = Researchers::where([])->orderBy('order_num', 'asc')->get();
        return Theme::scope('researchers', [ 'researchers' => $researchers])->render();
    }
    public function researcherPage($id)
    {
        // Posts of reseaarcher.
        // $posts = Post::join("language_meta", function ($join) {
        //     $join->on("language_meta.reference_id", "=", "id")
        //         ->where(["language_meta.reference_type"=> 'Botble\Blog\Models\Post','language_meta.lang_meta_code'=>'ar']);
        // })->where(['status' => BaseStatusEnum::PUBLISHED(), 'researcher_id' => $id])->paginate(8);

        $researcher = Researchers::find($id);

        if (!$researcher) {
            abort(404);
        }
                
        if(isset($researcher)){
            SeoHelper::setTitle($researcher->name)
                        ->setDescription($researcher->summary);
        }

        return Theme::scope('researcher_profile', ['researcher' => $researcher])->render();
    }


}
