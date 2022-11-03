<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Make\Field\Fk;

use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Orm\Traits\Kill;
use Tall\Theme\Models\Make;
use Tall\Theme\Models\MakeField;
use Tall\Theme\Models\MakeFieldFk;

class EditComponent extends FormComponent
{

    use Kill;

    public function mount(MakeFieldFk $make_field_fk)
    {
        // dd($make_field_fk->toArray());
        $this->setFormProperties($make_field_fk);
    }

        /**
     * Monta um array de campos (opcional)
     * Voce pode sobrescrever essas informações no component filho
     * Uma opção e trazer essas informações do banco
     * @return array
     */
    protected function fields()
    {
        $models = app(Make::class)->query()->pluck('name','id')->toArray();

        $local_fields = app(MakeField::class)->query()
        ->where('make_id',data_get($this->model, 'make_id'))
        ->orderBy('ordering')->pluck('column_name','id')->toArray();

        $foreign_fields = app(MakeField::class)->query()
        ->where('make_id',data_get($this->form_data, 'make_model_id'))
        ->orderBy('ordering')->pluck('column_name','id')->toArray();
        return [
            Field::select('Modelo','make_model_id',$models)->rules('required'),
            Field::select('Chave primaria','local_key_id',$local_fields)->rules('required'),
            Field::select('Chave estrangeira','foreign_key_id', $foreign_fields )->rules('required'),
            Field::select('Tipo','foreign_type', array_combine(['hasOne','hasMany','belongsTo','belongsToMany'],['hasOne','hasMany','belongsTo','belongsToMany']))->rules('required'),
        ];
    }
    
    /**
     * Parametros (array) de informações
     * Usado para atualizar as informações do component depois de uma exclusão do registro
     * Voce pode sobrescrever essas informações no component filho
     */
    public function refreshDelete($data=[]){
        $this->showModal = false;
    }

    protected function view($component= "-component")
    {
        return 'tall::admin.make.field.fk.edit-component';
    }
}
