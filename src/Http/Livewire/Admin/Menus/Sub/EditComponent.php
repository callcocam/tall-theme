<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Menus\Sub;

use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Theme\Contracts\IMenu;
use Tall\Theme\Contracts\IMenuSub;

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
       $this->setFormProperties(app(IMenuSub::class)->firstWhere('id', $model)); 
   }
    
   protected function fields()
   {
      
       return [
        Field::make('Nome do menu', 'name')->rules('required')->span(3),
        Field::select('Menu', 'menu_sub_id', app(IMenuSub::class)->query()->pluck('name','id'))->span(3),
        Field::make('Link de acesso', 'link')->span(3),
        Field::icone(load_icones_tom() )->span(3),
        Field::checkbox('Menus', 'menus', app(IMenu::class)->pluck('name', 'id')->toArray()),
        Field::status()->rules('required'),
        Field::date('Data de criação','created_at')->span(6),
        Field::date('Última atualização', 'updated_at')->span(6)
        ];
   }

   

   public function success($callback = null)
   {
    
       if(parent::success($callback)){
         $this->model->menus()->sync(data_get($this->form_data, 'menus'));
       }
       return true;
   }

    public function view($compnent="-component")
    {
        return 'tall::admin.menus.edit-component';
    }
}
