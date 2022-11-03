<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Make\Field;

use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Theme\Models\MakeField;

class EditComponent extends FormComponent
{
    
    public $make_field_attributes = true;

    public function mount(MakeField $make_field)
    {
        $this->setFormProperties($make_field);
    }
      /**
     * Monta um array de campos (opcional)
     * Voce pode sobrescrever essas informações no component filho
     * Uma opção e trazer essas informações do banco
     * @return array
     */
    protected function fields()
    {
        return [
            Field::make('column_name','column_name')->rules('required'),
            Field::select('column_type','column_type')->component('select-types')->rules('required'),
            Field::make('column_with','column_with'),
            Field::checkbox('column_nullable','column_nullable'),
            Field::checkbox('column_primary','column_primary'),
            Field::checkbox('column_index','column_index'),
            Field::checkbox('column_unique','column_unique'),
            Field::make('column_default','column_default'),
            Field::make('ordering','ordering'),
        ];
    }

    protected function view($component= "-component")
    {
        return 'tall::admin.make.field.edit-component';
    }
}
