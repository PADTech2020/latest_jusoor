<?php

namespace Botble\Circuit\Providers;

use Botble\Circuit\Models\Circuit;
use Illuminate\Support\ServiceProvider;
use Botble\Circuit\Repositories\Caches\CircuitCacheDecorator;
use Botble\Circuit\Repositories\Eloquent\CircuitRepository;
use Botble\Circuit\Repositories\Interfaces\CircuitInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class CircuitServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(CircuitInterface::class, function () {
            return new CircuitCacheDecorator(new CircuitRepository(new Circuit));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/circuit')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Circuit::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-circuit',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/circuit::circuit.name',
                'icon'        => 'fa fa-list',
                'url'         => route('circuit.index'),
                'permissions' => ['circuit.index'],
            ]);
        });
    }
}
