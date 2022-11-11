<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Menus;

use Illuminate\Support\Facades\Route;
use Tall\Orm\Http\Livewire\TableComponent;
use Tall\Table\Fields\Column;
use Tall\Theme\Models\Menu;

class ListComponent extends TableComponent
{
    
    public function mount()
    {
        
        $this->setUp(Route::currentRouteName());

        $this->setConfigProperties($this->moke($this->getName()));
        
    }
    
    
    /**
     * Função para trazer uma lista de colunas (opcional)
     * Geralmente usada com um component de table dinamicas
     * Voce pode sobrescrever essas informações no component filho 
     */
    public function columns(){
        return [
            Column::make('Name'),
            Column::status(),
            Column::actions([
                Column::make('Edit')->icon('pencil')->route('admin.menus.edit'),
                Column::make('Delete')->icon('trash')->route('admin.menus.delete'),
            ]),

        ];
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
