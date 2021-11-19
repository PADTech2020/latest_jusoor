<?php

namespace Botble\Survey\Providers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Shortcode\Compilers\Shortcode;
use Botble\SimpleSlider\Repositories\Interfaces\SimpleSliderInterface;
use Botble\Survey\Repositories\Interfaces\SurveyInterface;
use Illuminate\Support\ServiceProvider;
use Theme;

class HookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->booted(function () {
            if (!$this->app->isDownForMaintenance()) {
                if (setting('simple_slider_using_assets', true) && defined('THEME_OPTIONS_MODULE_SCREEN_NAME')) {
                    Theme::asset()
//                        ->add('owl.carousel',
//                            asset('vendor/core/plugins/simple-slider/libraries/owl-carousel/owl.carousel.css'), [], [],
//                            '1.0.0')
                        ->add('survey', asset('vendor/core/plugins/survey/css/survey.css'), [],
                            ['jquery'], '1.0.0');
//
                    Theme::asset()
                        ->container('footer')
                        ->usePath(false)
//                        ->add('carousel',
//                            asset('vendor/core/plugins/simple-slider/libraries/owl-carousel/owl.carousel.js'),
//                            ['jquery'], [], '1.0.0')
                        ->add('survey', asset('vendor/core/plugins/survey/js/survey.js'),
                            ['jquery'], [], '1.0.0');
                }

                if (function_exists('shortcode')) {
                    add_shortcode('simple-survey',
                        trans('Survey'),
                        trans('Survey'),
                        [$this, 'render']);

                    shortcode()->setAdminConfig('simple-survey', function () {
                        $survey = $this->app->make(SurveyInterface::class)->allBy(['status' => BaseStatusEnum::PUBLISHED]);

                        return view('plugins/survey::partials.simple-survey-admin-config', compact('survey'))->render();
                    });
                }
            }

            add_filter(BASE_FILTER_AFTER_SETTING_CONTENT, [$this, 'addSettings'], 301);
        });
    }

    /**
     * @param Shortcode $shortcode
     * @return null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function render($shortcode)
    {
        $Survey = $this->app->make(SurveyInterface::class)->getFirstBy([
            'id' => $shortcode->id,
            'status' => BaseStatusEnum::PUBLISHED,
        ]);

        if (empty($Survey)) {
            return null;
        }

        return view(apply_filters(SIMPLE_SURVEY_VIEW_TEMPLATE, 'plugins/survey::survey'), ['survey' => $Survey]);
    }

    /**
     * @param null $data
     * @return string
     * @throws \Throwable
     */
    public function addSettings($data = null)
    {
        return $data . view('plugins/simple-slider::setting')->render();
    }
}
