<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Make;

use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Theme\Models\Make;

class EditComponent extends FormComponent
{
    
    public function mount(Make $model)
    {
        $this->setFormProperties($model);
        
    }
    
    protected function fields()
    {
       
        return [
            Field::make('Nome do app', 'name')->rules('required'),
            Field::make('Nome da rota','route')->rules('required'),
            Field::make('Url de accesso exemplo ( posts ) saida (/admin/posts)','path')->rules('required'),
            Field::make('Nome da modelo para comunicação com o banco','model'),
            Field::make('Por padrão usa as views que estão dentro pasta makes','view')->rules('required'),
            Field::make('Por padrão usa os components dentro de  \\Tall\\Cms\\Http\\Livewire\\Admin\\Makes','component')->rules('required'),
            Field::radio('Situação doAPP','status', ['published','draft']),
            Field::textarea('Descrição do uso do APP','description'),
            Field::date('Data de criação','created_at'),
            Field::date('Última atualização', 'updated_at'),
        ];
    }
    protected function view($component= "-component")
    {
        return 'tall::admin.make.edit-component';
    }
}
