<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

class ThemeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // if (!$this->app->runningInConsole()){
        //     if(!\Schema::hasTable('tenants')){
        //         return;
        //     }
        // }
        if ($this->app->runningInConsole()) {
            //$this->commands([\Tall\Theme\Commands\CreateCommand::class]);
        }

        $this->publishViews();
        $this->publishConfigs();
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', "theme");

        include_once __DIR__."/../helpers.php";
       
        $this->loadComponent('dropdown-link');
        $this->loadComponent('nav-link-dropdown');
        $this->loadComponent('nav-link');
        $this->loadComponent('breadcrums');
        $this->loadComponent('date-picker');
        $this->createDirectives();
        if (class_exists(Livewire::class)) {
            Livewire::component( 'theme::admin.includes.sidebar', \Tall\Theme\Http\Livewire\Admin\Includes\Sidebar::class);
            Livewire::component( 'theme::admin.includes.header', \Tall\Theme\Http\Livewire\Admin\Includes\Header::class);
       
            $this->app->register(RouteServiceProvider::class);     
        }
    }

    public function register(): void
    {
        if (!$this->app->runningInConsole()){
            if(!\Schema::hasTable('tenants')){
                return;
            }   
        }
     
        $this->mergeConfigFrom(
            __DIR__ . '/../config/theme.php','theme'
        );
        $this->app->alias(ThemeManager::class, 'theme');
    }
    
    private function publishViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'theme');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/theme'),
        ], 'theme-views');


        
        $this->publishes([
            __DIR__ . '/../resources/views/dash' => resource_path('views'),
            __DIR__ . '/../public' => public_path(),
        ], 'theme-js');

        
        $this->publishes([
            __DIR__ . '/../public/img' => public_path('img'),
        ], 'theme-img');

        
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/theme'),
            __DIR__ . '/../resources/js/assets' => public_path('js/assets'),
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/theme' ),
            __DIR__ . '/../config/theme.php' => config_path('theme.php'),
            __DIR__ . '/../public/img' => public_path('img'),
        ], 'theme');

    }

    private function publishConfigs(): void
    {
        $this->publishes([
            __DIR__ . '/../config/theme.php' => config_path('theme.php'),
        ], 'theme-config');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/theme' ),
        ], 'theme-lang');
    }

    public function loadComponent($component, $alias=null){
        if ($alias == null){
            $alias=$component;
        }
        Blade::component("theme::components.{$component}",'tall-'.$alias);
    }

    private function createDirectives(): void
    {
        Blade::directive('tallStyles', function () {
            return "<?php echo view('theme::assets.styles')->render(); ?>";
        });

        Blade::directive('tallScripts', function () {
            return "<?php echo view('theme::assets.scripts')->render(); ?>";
        });

        
        Blade::directive('tallLoader', function () {
            return "<?php echo view('theme::assets.loader')->render(); ?>";
        });
    }

   
}
