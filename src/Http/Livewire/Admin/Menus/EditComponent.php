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
use Tall\Theme\Contracts\IMenu;
use Tall\Theme\Contracts\IMenuSub;
use Tall\Theme\Models\Menu;

class EditComponent extends FormComponent
{
    /*
   |--------------------------------------------------------------------------
   |  Features mount
   |--------------------------------------------------------------------------
   | Inicia o formulario com um cadastro vasio
   |
   */
   public function mount($model)
   {
       $this->setFormProperties(app(IMenu::class)->firstWhere('id', $model)); 
   }
   
   
   protected function fields()
   {
      
       return [
           Field::make('Nome da role', 'name')->rules('required'),
           Field::status()->rules('required'),
           Field::date('Data de criação','created_at')->span(6),
           Field::date('Última atualização', 'updated_at')->span(6),
           Field::checkbox('Menus', 'menus', app(IMenuSub::class)
           ->when(isTenant(), function($builder){
            return $builder->tenants(get_tenant_id());
           })
           ->pluck('name', 'id')->toArray())->multiple(true),
        ];
   }

   
   public function success($callback = null)
   {
       if(parent::success($callback)){
        $subMenus = data_get($this->form_data, 'menus');

        foreach ($subMenus as $value) {
            # code...
        }
       }
       return true;
   }
   
    public function view($compnent="-component")
    {
        return 'tall::admin.menus.edit-component';
    }
}
