<?php
//add_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, function ($screen, $data) {
//   if (in_array($screen, [PAGE_MODULE_SCREEN_NAME, POST_MODULE_SCREEN_NAME])) {
// foreach(\Botble\Blog\Models\Post::getPostsForOthersLang($data->id) as $postR){
//  $url=\Botble\Blog\Models\Post::find($postR->reference_id)->url;
// echo'<link rel="alternate" hreflang="'.$postR->lang_meta_code.'" href="'.$url.'">';
// }


//  }
//}, 120, 2);


register_page_template([
    'default' => 'Default'
]);

register_sidebar([
    'id' => 'second_sidebar',
    'name' => 'Second sidebar',
    'description' => 'This is a sample sidebar for nedaa-post theme',
]);
register_page_template([
    'home2' => __('Home 2 layout'), // custom-layout is the name of layout file.
]);
add_shortcode('google-map', 'Google map', 'Custom map', function ($shortCode) {
    return Theme::partial('short-codes.google-map', ['address' => $shortCode->content]);
});

add_shortcode('youtube-video', 'Youtube video', 'Add youtube video', function ($shortCode) {
    return Theme::partial('short-codes.video', ['url' => $shortCode->content]);
});

add_shortcode('author-box', 'Author Box', 'Add Author-box ', function ($shortCode) {
    return Theme::partial('short-codes.author-box', ['id' => $shortCode->id]);
});

add_shortcode('image-ad', 'Image Ad', 'Add image', function ($shortCode) {
    return Theme::partial('short-codes.image-ad', ['url' => $shortCode->content]);
});
add_shortcode('category-posts', 'Category posts', 'Category posts', function () {
    return Theme::partial('short-codes.category-posts');
});

add_shortcode('all-galleries', 'All Galleries', 'All Galleries', function () {
    return Theme::partial('short-codes.all-galleries');
});
add_shortcode('thumb-post', 'Thumb Post', 'Add thumb post', function ($shortCode) {

    $post = \Botble\Blog\Models\Post::where(['short_link' => $shortCode->shortlink])->orderBy('id', 'DESC')->first();
    return Theme::partial('short-codes.thumb-post', ['shortLink' => $shortCode->shortlink, 'post' => $post]);
});
shortcode()->setAdminConfig('thumb-post', Theme::partial('short-codes.thumb-post-admin-config'));
register_sidebar([
    'id' => 'sidebar_currencies',
    'name' => __('Currencies'),
    'description' => __('This the description for widget area'),
]);

shortcode()->setAdminConfig('google-map', Theme::partial('short-codes.google-map-admin-config'));

shortcode()->setAdminConfig('youtube-video', Theme::partial('short-codes.youtube-admin-config'));

add_shortcode('featured-posts', 'Featured posts', 'Featured posts', function () {
    return Theme::partial('short-codes.featured-posts');
});
add_shortcode('slider-posts', 'Slider posts', 'Slider posts', function () {
    return Theme::partial('short-codes.slider-posts');
});
add_shortcode('slider-posts-2', 'Slider posts 2', 'Slider posts 2', function () {
    return Theme::partial('short-codes.slider-posts-2');
});
add_shortcode('sport', 'Slider sport', 'Slider sport', function () {
    return Theme::partial('short-codes.sport');
});
add_shortcode('subscribe-form', 'Subscribe Form', 'Subscribe Form', function () {
    // return Theme::partial('short-codes.featured-posts');
    return Theme::partial('short-codes.subscribe-form');
});

function ExtractTweetUrl($string)
{
    preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $string, $match);
//    echo "<pre>";
//    print_r($match[0]);
//    echo "</pre>";
    foreach ($match[0] as $s_url) {
        $regex = '#https?://twitter\.com/(?:\#!/)?(\w+)/status(es)?/(\d+)#is';
        if (preg_match($regex, $s_url, $match)) {
            $url = $match[0];
            $tid = $match[3];
            $string = str_replace($s_url, $url, $string);
            $string = str_replace($url, '
        <iframe style="height: auto;" allowfullscreen="true" allowtransparency="true" data-tweet-id="' . $tid . '" frameborder="1" height="auto" id="twitter-widget-2" scrolling="yes" src="https://platform.twitter.com/embed/index.html?dnt=false&amp;embedId=twitter-widget-2&amp;frame=false&amp;hideCard=false&amp;hideThread=false&amp;id=' . $tid . '&amp;lang=ar" title="Twitter Tweet" width="700"></iframe>
        ', $string);
            return $string;

        }
    }
    return $string;
//    $regex = '#https?://twitter\.com/(?:\#!/)?(\w+)/status(es)?/(\d+)#is';
//
//    if (preg_match($regex, $string, $match)) {
//        $url = $match[0];
//        $tid = $match[3];
//        return str_replace($url, '
//        <iframe style="height: auto;" allowfullscreen="true" allowtransparency="true" data-tweet-id="' . $tid . '" frameborder="1" height="auto" id="twitter-widget-2" scrolling="yes" src="https://platform.twitter.com/embed/index.html?dnt=false&amp;embedId=twitter-widget-2&amp;frame=false&amp;hideCard=false&amp;hideThread=false&amp;id=' . $tid . '&amp;lang=ar" title="Twitter Tweet" width="700"></iframe>
//        ', $string);
//
//    }

}

function ExtractFacebookpost($string)
{
    $regex = '#https?://www.facebook\.com/(?:\#!/)?(\w+)/posts(es)?/(\d+)#is';

    if (preg_match($regex, $string, $match)) {
        $url = $match[0];
        return str_replace($url, '<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2F' . $match[1] . '%2Fposts%2F' . $match[3] . '&width=500&show_text=true&appId=1301512949951148&height=505" width="500" height="505" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>', $string);
    }
    return $string;
}

function ExtractFacebookvideo($string)
{
    $regex = '#https?://www.facebook\.com/(?:\#!/)?(\w+)/videos(es)?/(\d+)#is';

    if (preg_match($regex, $string, $match)) {
        $url = $match[0];
        return str_replace($url, '<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2F' . $match[1] . '%2Fposts%2F' . $match[3] . '&width=500&show_text=true&appId=1301512949951148&height=505" width="500" height="505" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>', $string);
        // return ' thiss is test';
    }
    return $string;
}

function arabicDate($time)
{
    $months_en = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $months_ar = ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"];

    $find = array("Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
    $replace = array("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $am_pm = ['AM' => 'صباحاً', 'PM' => 'مساءً'];


    $numbers_ar = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
    $numbers_en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    $temp = str_replace($find, $replace, $time);
    return str_replace($months_en, $months_ar, $temp);
}
function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<div class='vid-container'><iframe style='width:100%;' src=\"//www.youtube.com/embed/$2\" class='video-ifram' allowfullscreen ></iframe></div>",
        $string
    );
}
function GetMediaImg($image, $size)
{
    $img = RvMedia::getImageUrl($image, $size);
    if (url_exists($img)) {
        return $img;
    } else
        return RvMedia::getImageUrl($image);// 'https://nedaapost.s3.eu-west-3.amazonaws.com/depositphotos-247872612-stock-illustration-no-image-available-icon-vector.jpg';//RvMedia::getImageUrl($img);
}

function url_exists($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ($code == 200);
}

theme_option()
    ->setSection([
        'title' => __('Social'),
        'desc' => __('Social links'),
        'id' => 'opt-text-subsection-social',
        'subsection' => true,
        'icon' => 'fa fa-share-alt',
    ])
    ->setSection([
        'title' => __('Popup Ads'),
        'desc' => __('Telegram links'),
        'id' => 'opt-text-popup-ads',
        'subsection' => true,
        'icon' => 'fa fa-share-alt',
    ])
    ->setSection([ // Set section with no field
        'title' => __('Contact Us'),
        'desc' => __('Contact Info'),
        'id' => 'opt-contact',
        'subsection' => true,
        'icon' => 'fa fa-map',
    ])
    ->setSection([ // Set section with no field
        'title' => __('Gallery'),
        'desc' => __('Gallery '),
        'id' => 'opt-gallery',
        'subsection' => true,
        'icon' => 'fa fa-images',
    ])
    ->setSection([ // Set section with no field
        'title' => __('About us'),
        'desc' => __('About us Page '),
        'id' => 'opt-about-us',
        'subsection' => true,
        'icon' => 'fa fa-edit',
    ])
    ->setField([
        'id' => 'about-us',
        'section_id' => 'opt-about-us',
        'type' => 'editor',
        'label' => __('About Us'),
        'attributes' => [
            'name' => 'about-us',
            'value' => null, // Default value
            'options' => [ // Optional
                'class' => 'form-control theme-option-textarea',
                'row' => '10',
            ],
        ],
        'helper' => __(' Who We Are on footer of site'),
    ])
    ->setField([
        'id' => 'gallery_id',
        'section_id' => 'opt-gallery',
        'type' => 'select', // select or customSelect
        'label' => __('Gallery'),
        'attributes' => [
            'name' => 'gallery_id',
            'data' => [],// \Botble\Gallery\Models\Gallery::getAll(),
            'value' => null, // default value
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id' => 'facebook',
        'section_id' => 'opt-text-subsection-social',
        'type' => 'text',
        'label' => 'Facebook',
        'attributes' => [
            'name' => 'facebook',
            'value' => null,
            'options' => [
                'class' => 'form-control',
                'placeholder' => 'https://facebook.com/@username',
            ],
        ],
    ])
    ->setField([
        'id' => 'twitter',
        'section_id' => 'opt-text-subsection-social',
        'type' => 'text',
        'label' => 'Twitter',
        'attributes' => [
            'name' => 'twitter',
            'value' => null,
            'options' => [
                'class' => 'form-control',
                'placeholder' => 'https://twitter.com/@username',
            ],
        ],
    ])
    ->setField([
        'id' => 'youtube',
        'section_id' => 'opt-text-subsection-social',
        'type' => 'text',
        'label' => 'Youtube',
        'attributes' => [
            'name' => 'youtube',
            'value' => null,
            'options' => [
                'class' => 'form-control',
                'placeholder' => 'https://youtube.com/@channel-url',
            ],
        ],
    ])
    ->setField([
        'id' => 'telegram',
        'section_id' => 'opt-text-subsection-social',
        'type' => 'text',
        'label' => 'Telegram',
        'attributes' => [
            'name' => 'telegram',
            'value' => null,
            'options' => [
                'class' => 'form-control',
                'placeholder' => 'https://telegram.org/',
            ],
        ],
    ])
    ->setField([
        'id' => 'instagram',
        'section_id' => 'opt-text-subsection-social',
        'type' => 'text',
        'label' => 'Instagram',
        'attributes' => [
            'name' => 'instagram',
            'value' => null,
            'options' => [
                'class' => 'form-control',
                'placeholder' => 'https://instagram.com/@channel-url',
            ],
        ],
    ])
    ->setField([
        'id' => 'linkedin',
        'section_id' => 'opt-text-subsection-social',
        'type' => 'text',
        'label' => 'Linkedin',
        'attributes' => [
            'name' => 'linkedin',
            'value' => null,
            'options' => [
                'class' => 'form-control',
                'placeholder' => 'https://linkedin.com/@channel-url',
            ],
        ],
    ])
    ->setField([
        'id' => 'img-popup-ads',
        'section_id' => 'opt-text-popup-ads',
        'type' => 'mediaImage',

        'label' => __('Image Ads'),

        'attributes' => [
            'name' => 'img-popup-ads',
            'value' => null,
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id' => 'title-popup-ads',
        'section_id' => 'opt-text-popup-ads',
        'type' => 'text',
        'label' => __('Title Popup Ads'),

        'attributes' => [
            'name' => 'title-popup-ads',
            'value' => __(''),
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id' => 'link-popup-ads',
        'section_id' => 'opt-text-popup-ads',
        'type' => 'text',
        'label' => __('Link Popup Ads'),

        'attributes' => [
            'name' => 'link-popup-ads',
            'value' => __(''),
            'options' => [
                'class' => 'form-control',

            ],
        ],
    ])
    ->setField([
        'id' => 'banner-ads',
        'section_id' => 'opt-text-subsection-social',
        'type' => 'mediaImage',
        'label' => __('Image Ads'),

        'attributes' => [
            'name' => 'banner-ads',
            'value' => null,
        ],
    ])
    ->setField([
        'id' => 'phone',
        'section_id' => 'opt-contact',
        'type' => 'text',
        'label' => __('Phone'),
        'attributes' => [
            'name' => 'phone',
            'value' => __(''),
            'options' => [
                'class' => 'form-control',
                'placeholder' => __('Change Phone'),
                'data-counter' => 255,
            ],
        ],
        'helper' => __(' Phone on footer of site'),
    ])
    ->setField([
        'id' => 'email',
        'section_id' => 'opt-contact',
        'type' => 'text',
        'label' => __('Email'),
        'attributes' => [
            'name' => 'email',
            'value' => __(''),
            'options' => [
                'class' => 'form-control',
                'placeholder' => __('Change Email'),
                'data-counter' => 255,
            ],
        ],
        'helper' => __(' Address on footer of site'),
    ])
    ->setField([
        'id' => 'address',
        'section_id' => 'opt-contact',
        'type' => 'text',
        'label' => __('Address'),
        'attributes' => [
            'name' => 'address',
            'value' => __(''),
            'options' => [
                'class' => 'form-control',
                'placeholder' => __('Change Address'),
                'data-counter' => 255,
            ],
        ],
        'helper' => __(' Address on footer of site'),
    ])
    ->setField([
        'id' => 'who_we_are',
        'section_id' => 'opt-text-subsection-general',
        'type' => 'text',
        'label' => __('Who We Are'),
        'attributes' => [
            'name' => 'who_we_are',
            'value' => __(''),
            'options' => [
                'class' => 'form-control',
                'placeholder' => __('Change Who We Are'),
                'data-counter' => 300,
            ],
        ],
        'helper' => __(' Who We Are on footer of site'),
    ])
    ->setField([
        'id' => 'light_logo',
        'section_id' => 'opt-text-subsection-logo',
        'type' => 'mediaImage',
        'label' => __('Light Logo'),
        'attributes' => [
            'name' => 'light_logo',
            'value' => __(''),
            'options' => [
                'class' => 'form-control',

                'data-counter' => 300,
            ],
        ],
        'helper' => __(' Who We Are on footer of site'),
    ])
    ->setField([
        'id' => 'copyright',
        'section_id' => 'opt-text-subsection-general',
        'type' => 'text',
        'label' => __('Copyright'),
        'attributes' => [
            'name' => 'copyright',
            'value' => '© 2020 Botble Technologies. All right reserved.',
            'options' => [
                'class' => 'form-control',
                'placeholder' => __('Change copyright'),
                'data-counter' => 250,
            ]
        ],
        'helper' => __('Copyright on footer of site'),
    ]);

add_action('init', function () {
    config(['filesystems.disks.public.root' => public_path('storage')]);
}, 124);
function GetYoutubeID($url)
{
    parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
    if (isset($my_array_of_vars['v']))
        return $my_array_of_vars['v'];
}



function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);

    $today = time();
    $interval = $today - strtotime($datetime);
    $days = floor($interval / 86400); // 1 day
    if ($days > 7) {
        return date('Y/m/d', strtotime($datetime));
    } else {


        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'سنة',
            'm' => 'شهر',
            'w' => 'اسبوع',
            'd' => 'يوم',
            'h' => 'ساعة',
            'i' => 'دقيقة',
            's' => 'ثانية',
        );
        $string_p = array(
            'y' => 'سنوات',
            'm' => 'اشهر',
            'w' => 'اسابيع',
            'd' => 'ايام',
            'h' => 'ساعات',
            'i' => 'دقائق',
            's' => 'ثوان',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                if (isset($string_p[$diff->$k]))
                    $v = ' ' . $v . (($diff->$k > 1 && ($diff->$k <= 10)) ? $string_p[$diff->$k] : '');
                else $v = $diff->$k . ' ' . $v . (($diff->$k > 1 && ($diff->$k <= 10)) ? '' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? ' منذ ' . implode(', ', $string) : 'الآن';
    }
}

RvMedia::addSize('post_big_main', 770, 450)->addSize('post_big_main', 770, 450);
RvMedia::addSize('list_main', 400, 225)->addSize('list_main', 400, 225);
RvMedia::addSize('featured', 560, 380)->addSize('featured', 560, 380);
RvMedia::addSize('item_post', 312, 176)->addSize('item_post', 312, 176);
RvMedia::addSize('under_post', 270, 200)->addSize('under_post', 270, 200);
RvMedia::addSize('side_bar', 80, 70)->addSize('side_bar', 80, 70);
