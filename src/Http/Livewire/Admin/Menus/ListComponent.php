<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Menus;

use Illuminate\Support\Facades\Route;
use Tall\Orm\Http\Livewire\TableComponent;
use Tall\Theme\Models\Menu;

class ListComponent extends TableComponent
{
    
    public function mount()
    {
        $this->setUp(Route::currentRouteName());
        
    }
    
    protected function query()
    {
        if(class_exists('\\App\\Models\\Menu')){
            return app('\\App\\Models\\Menu')->query();
        }
        return  Menu::query();
    }
    
    public function view($compnent="-component")
    {
        return 'tall::admin.menus.list-component';
    }
}
