<?php

namespace Botble\Researchers\Providers;

use Botble\Researchers\Models\Researchers;
use Illuminate\Support\ServiceProvider;
use Botble\Researchers\Repositories\Caches\ResearchersCacheDecorator;
use Botble\Researchers\Repositories\Eloquent\ResearchersRepository;
use Botble\Researchers\Repositories\Interfaces\ResearchersInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class ResearchersServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(ResearchersInterface::class, function () {
            return new ResearchersCacheDecorator(new ResearchersRepository(new Researchers));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/researchers')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
               \Language::registerModule([Researchers::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-researchers',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/researchers::researchers.name',
                'icon'        => 'fa fa-list',
                'url'         => route('researchers.index'),
                'permissions' => ['researchers.index'],
            ]);
        });
    }
}
