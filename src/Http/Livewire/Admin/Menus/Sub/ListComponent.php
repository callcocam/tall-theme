<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Menus\Sub;

use Illuminate\Support\Facades\Route;
use Tall\Orm\Http\Livewire\TableComponent;
use Tall\Theme\Models\MenuSub;

class ListComponent extends TableComponent
{

    
    public function mount()
    {
        $this->setUp(Route::currentRouteName());
        
    }
    
    protected function query()
    {
        if(class_exists('\\App\\Models\\MenuSub')){
            return app('\\App\\Models\\MenuSub')->query();
        }
        return  MenuSub::query();
    }
    
    public function view($compnent="-component")
    {
        return 'tall::admin.menus.sub.list-component';
    }
}
