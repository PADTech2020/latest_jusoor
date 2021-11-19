<?php

namespace Botble\Blog\Services;

use Botble\Blog\Models\Post;
use Botble\Blog\Services\Abstracts\StoreCategoryServiceAbstract;
use Illuminate\Http\Request;

class StoreCircuitService extends StoreCategoryServiceAbstract
{

    /**
     * @param Request $request
     * @param Post $post
     * @return mixed|void
     */
    public function execute(Request $request, Post $post)
    {
        $circuits = $request->input('circuits');
       
        if (!empty($circuits)) {
            $post->circuits()->detach();
            foreach ($circuits as $circuit) {
                $post->circuits()->attach($circuit);
            }
        }
    }
}
