<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Menus;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Theme\Contracts\Menu as ContractsMenu;
use Tall\Theme\Models\Menu;

class EditComponent extends FormComponent
{
    use AuthorizesRequests;
    /*
   |--------------------------------------------------------------------------
   |  Features mount
   |--------------------------------------------------------------------------
   | Inicia o formulario com um cadastro vasio
   |
   */
   public function mount(?Menu $model)
   {
       $this->authorize(Route::currentRouteName());
       
       $this->setFormProperties(app(ContractsMenu::class)->firstWhere('id', $model->id),Route::currentRouteName()); 
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
        return 'tall::admin.menus.edit-component';
    }
}
