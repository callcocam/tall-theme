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
use Tall\Theme\Contracts\IMenu;
use Tall\Theme\Models\Menu;

class ListComponent extends TableComponent
{
    
    public function mount()
    {
        
        $this->setUp(Route::currentRouteName());
        
    }
    
    
    /**
     * Função para trazer uma lista de colunas (opcional)
     * Geralmente usada com um component de table dinamicas
     * Voce pode sobrescrever essas informações no component filho 
     */
    public function columns(){
        return [
            Column::make('Name'),
            // Column::status(),
            Column::actions([
                Column::make('Edit')->icon('pencil')->route('admin.menus.edit'),
                Column::make('Delete')->icon('trash')->route('admin.menus.delete'),
            ]),

        ];
    }
    
    protected function query()
    {
        return  app()->make(IMenu::class)::query()->when(isTenant(), function($builder){
            return $builder->tenants(get_tenant_id());
        });
    }
    
    public function view($compnent="-component")
    {
        return 'tall::admin.menus.list-component';
    }

    public function getImportProperty()
    {
        return 'tall::admin.menus.import.csv-component';
    }
}
