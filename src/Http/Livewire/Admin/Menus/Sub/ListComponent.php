<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Menus\Sub;

use Illuminate\Support\Facades\Route;
use Tall\Orm\Http\Livewire\TableComponent;
use Tall\Table\Fields\Column;
use Tall\Theme\Contracts\IMenuSub;

class ListComponent extends TableComponent
{

    
    public function mount()
    {
        $this->setUp(Route::currentRouteName());
        
    }
    
    protected function query()
    {
        return  app()->make(IMenuSub::class)::query();
    }
    
    /**
     * Função para trazer uma lista de colunas (opcional)
     * Geralmente usada com um component de table dinamicas
     * Voce pode sobrescrever essas informações no component filho 
     */
    public function columns(){
        return [
            Column::make('Name'),
            Column::make('Menu','menu_sub_id'),
            // Column::status(),
            Column::actions([
                Column::make('Edit')->icon('pencil')->route('admin.menus.sub-menus.edit'),
                Column::make('Delete')->icon('trash')->route('admin.menus.sub-menus.delete'),
            ]),

        ];
    }
    
    public function view($compnent="-component")
    {
        return 'tall::admin.menus.sub.list-component';
    }

    
    public function getImportProperty()
    {
        return 'tall::admin.menus.sub.import.csv-component';
    }
}
