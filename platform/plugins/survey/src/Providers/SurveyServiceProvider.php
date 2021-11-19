<?php

namespace Botble\Survey\Providers;

use Botble\Survey\Models\Survey;
use Illuminate\Support\ServiceProvider;
use Botble\Survey\Repositories\Caches\SurveyCacheDecorator;
use Botble\Survey\Repositories\Eloquent\SurveyRepository;
use Botble\Survey\Repositories\Interfaces\SurveyInterface;
use Illuminate\Support\Facades\Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class SurveyServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(SurveyInterface::class, function () {
            return new SurveyCacheDecorator(new SurveyRepository(new Survey));
        });

        $this->setNamespace('plugins/survey')->loadHelpers();
    }

    public function boot()
    {
        $this
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);
        $this->app->register(HookServiceProvider::class);
        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Survey::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-survey',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/survey::survey.name',
                'icon'        => 'fa fa-question-circle',
                'url'         => route('survey.index'),
                'permissions' => ['survey.index'],
            ]);
        });
    }
}
