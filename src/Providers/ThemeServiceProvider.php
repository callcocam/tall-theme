<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Livewire\Livewire;
use Tall\Theme\Contracts\IMenu;
use Tall\Theme\Contracts\IMenuSub;
use Tall\Theme\Models\Menu;
use Tall\Theme\Models\MenuSub;
use Tall\Theme\View\Components\TeamLinkComponent;

class ThemeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            //$this->commands([\Tall\Theme\Commands\CreateCommand::class]);
        }
        Blade::component('tall-team-link', TeamLinkComponent::class);

        $this->loadLivewireComponents();
        
        $this->publishViews();

        $this->publishConfigs();

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', "tall");

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'tall');
        
        if(!is_dir(database_path('migrations/landlord'))){
            $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        }
       
        self::configureDynamicComponent(__DIR__."/../../resources/views/components");

        if(is_dir(resource_path("views/vendor/tall/theme/components"))){
            self::configureDynamicComponent(resource_path("views/vendor/tall/theme/components"));
        }

        // include_once __DIR__."/../../helpers.php";

        // $this->createDirectives();

        $this->app->register(RouteServiceProvider::class);    
        
    }

    public function register(): void
    {
        if (!$this->app->runningInConsole()){
            if(!Schema::hasTable('tenants')){
                return;
            }   
        }
     
        if(class_exists('App\Models\Menu')){
            $this->app->singleton(IMenu::class, 'App\Models\Menu');
        }
        else{
            $this->app->singleton(IMenu::class, Menu::class);
        }
     
        if(class_exists('App\Models\MenuSub')){
            $this->app->singleton(IMenuSub::class, 'App\Models\MenuSub');
        }
        else{
            $this->app->singleton(IMenuSub::class, MenuSub::class);
        }

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/theme.php','theme'
        );
        
    }
    
    protected function loadLivewireComponents(){

        if (class_exists(Livewire::class)) {
            Livewire::component( 'tall::admin.dashboard-component', \Tall\Theme\Http\Livewire\Admin\DashboardComponent::class);
            Livewire::component( 'tall::admin.settings.apps.list-component', \Tall\Theme\Http\Livewire\Admin\Settings\Apps\ListComponent::class);
           
            Livewire::component( 'tall::admin.menus.list-component', \Tall\Theme\Http\Livewire\Admin\Menus\ListComponent::class);
            Livewire::component( 'tall::admin.menus.create-component', \Tall\Theme\Http\Livewire\Admin\Menus\CreateComponent::class);
            Livewire::component( 'tall::admin.menus.edit-component', \Tall\Theme\Http\Livewire\Admin\Menus\EditComponent::class);
            Livewire::component( 'tall::admin.menus.show-component', \Tall\Theme\Http\Livewire\Admin\Menus\ShowComponent::class);
            Livewire::component( 'tall::admin.menus.delete-component', \Tall\Theme\Http\Livewire\Admin\Menus\DeleteComponent::class);
            Livewire::component( 'tall::admin.menus.attribute.edit-component', \Tall\Theme\Http\Livewire\Admin\Menus\Attribute\AttributeComponent::class);
            Livewire::component( 'tall::admin.menus.import.csv-component', \Tall\Theme\Http\Livewire\Admin\Menus\Import\CsvComponent::class);
            
            Livewire::component( 'tall::admin.menus.sub-menus.list-component', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\ListComponent::class);
            Livewire::component( 'tall::admin.menus.sub-menus.create-component', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\CreateComponent::class);
            Livewire::component( 'tall::admin.menus.sub-menus.edit-component', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\EditComponent::class);
            Livewire::component( 'tall::admin.menus.sub-menus.show-component', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\ShowComponent::class);
            Livewire::component( 'tall::admin.menus.sub.import.csv-component', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\Import\CsvComponent::class);

            Livewire::component( 'tall::includes.partials.sidebar.main-component', \Tall\Theme\Http\Livewire\Includes\Partials\Sidebar\MainComponent::class);
            Livewire::component( 'tall::includes.partials.sidebar.panel-component', \Tall\Theme\Http\Livewire\Includes\Partials\Sidebar\PanelComponent::class);
            Livewire::component( 'tall::includes.partials.header-component', \Tall\Theme\Http\Livewire\Includes\Partials\HeaderComponent::class);
            Livewire::component( 'tall::includes.partials.mobile.searchbar-component', \Tall\Theme\Http\Livewire\Includes\Partials\Mobile\SearchbarComponent::class);
            Livewire::component( 'tall::includes.partials.sidebar.right-component', \Tall\Theme\Http\Livewire\Includes\Partials\Sidebar\RightComponent::class);
            Livewire::component( 'tall::includes.partials.sidebar.user-component', \Tall\Theme\Http\Livewire\Includes\Partials\Sidebar\UserComponent::class);
           
           
           
            Livewire::component( 'tall::includes.partials.nav.headers.header-component', \Tall\Theme\Http\Livewire\Includes\Partials\Nav\Headers\HeaderComponent::class);

        }
    }

    private function publishViews(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/tall/theme'),
        ], 'theme-views');
        
        $this->publishes([
            __DIR__ . '/../../assets/livewire' => resource_path('views/vendor/livewire'),
            __DIR__ . '/../../resources/css' => resource_path('css'),
            __DIR__ . '/../../resources/js' => resource_path('js'),
            __DIR__ . '/../../assets/docker-compose.yml' => base_path('docker-compose.yml'),
            __DIR__ . '/../../assets/package.json' => base_path('package.json'),
            __DIR__ . '/../../assets/tailwind.config.js' => base_path('tailwind.config.js'),
            __DIR__ . '/../../assets/vite.config.js' => base_path('vite.config.js'),
            __DIR__ . '/../../assets/images' => public_path('images'),
        ], 'theme-js');

        $this->publishes([
            __DIR__ . '/../../assets/livewire' => resource_path('views/vendor/livewire'),
            __DIR__ . '/../../assets/docker-compose.yml' => base_path('docker-compose.yml'),
            __DIR__ . '/../../assets/package.json' => base_path('package.json'),
            __DIR__ . '/../../assets/tailwind.config.js' => base_path('tailwind.config.js'),
            __DIR__ . '/../../assets/vite.config.js' => base_path('vite.config.js'),
            __DIR__ . '/../../assets/images' => public_path('images'),
        ], 'theme-install');


        
        $this->publishes([
            __DIR__ . '/../../public/img' => public_path('img'),
        ], 'theme-img');

        $this->publishes([
            __DIR__ . '/../../database' => database_path(),
        ], 'theme-database');
        
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/tall/theme'),
            __DIR__ . '/../../resources/js/assets' => public_path('js/assets'),
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/tall/theme' ),
            __DIR__ . '/../../config/theme.php' => config_path('theme.php'),
            __DIR__ . '/../../public/img' => public_path('img'),
            __DIR__ . '/../../database' => database_path(),
        ], 'theme');

    }

    private function publishConfigs(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/theme.php' => config_path('theme.php'),
        ], 'theme-config');

        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/theme' ),
        ], 'theme-lang');
    }
/**
     * Configure the component for the application.
     *
     * @return void
     */
    public static function configureDynamicComponent($path,$search=".blade.php")
    {
       foreach ((new Finder)->in($path)->files()->name('*.blade.php') as $component) {                   
            $componentPath = $component->getRealPath();     
            $namespace = Str::beforeLast($componentPath, $search);
            $namespace = Str::afterLast($namespace, 'components/');
            $name = Str::replace(DIRECTORY_SEPARATOR,'.',$namespace);
            self::loadComponent($name, $name);
        }
    }

    public static function loadComponent($component, $alias=null){
        if ($alias == null){
            $alias=$component;
        }
        Blade::component("tall::components.{$component}",'tall-'.$alias);
    }
   
}
