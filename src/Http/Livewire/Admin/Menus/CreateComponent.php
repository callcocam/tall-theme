<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Menus;

use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Theme\Contracts\Menu as ContractsMenu;
use Tall\Theme\Models\Menu;

class CreateComponent extends FormComponent
{

     /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?Menu $model)
    {
        
        $this->setFormProperties(app(ContractsMenu::class)->make($this->blankModel()),Route::currentRouteName()); 
    }

    
    protected function fields()
    {
       
        return [
            Field::make('Nome da role', 'name')->rules('required'),
            Field::status()->rules('required'),
            Field::date('Data de criação','created_at')->span(6),
            Field::date('Última atualização', 'updated_at')->span(6)
         ];
    }
    
    public function view($compnent="-component")
    {
        return 'tall::admin.menus.create-component';
    }
}
