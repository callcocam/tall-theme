<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Make\Field;

use Tall\Form\Fields\Field;
use Tall\Form\FormComponent;
use Tall\Theme\Models\Make;

class CreateComponent extends FormComponent
{

    public $make_field_attributes = false;

    public function mount(Make $model)
    {
        $this->setFormProperties($model);
       
    }

     /**
     * Monta um array de campos (opcional)
     * Voce pode sobrescrever essas informações no component filho
     * Uma opção e trazer essas informações do banco
     * @return array
     */
    protected function fields()
    {
        $oderings = data_get($this->model, 'make_fields', []);
        $data=[];
        foreach ($oderings as $value) {
            $data[$value->ordering] = $value->column_name;
        }
        return [
            Field::make('column_name','make_fields.column_name')->rules('required'),
            Field::select('column_type','make_fields.column_type')->component('select-types')->rules('required'),
            Field::make('column_with','make_fields.column_with'),
            Field::checkbox('column_nullable','make_fields.column_nullable'),
            Field::checkbox('column_primary','make_fields.column_primary'),
            Field::checkbox('column_index','make_fields.column_index'),
            Field::checkbox('column_unique','make_fields.column_unique'),
            Field::make('column_default','make_fields.column_default'),
            Field::select('ordering','make_fields.ordering', $data),
        ];
    }

    /**
     * @param $callback uma função anonima para dar um retorno perssonalizado
     * Função de sucesso ou seja passou por todas as validações e agora pode ser salva no banco
     * Voce pode sobrescrever essas informações no component filho
     */
    protected function success($callback=null)
    {
        /**
         * Cadastra uma nova informação
         */
        $this->create($callback);
    }

     /**
     * pré tratamento e validações dos dados
     * Voce pode sobrescrever essas informações no component filho
     */
    public function submit()
    {
        if ($this->rules())
            $this->validate($this->rules());

            return $this->success();
    }

    /**
     * Cadastra uma nova informação 
     * Voce pode sobrescrever essas informações no component filho
     */
    protected function create($callback=null){
        try {
            $model = $this->model->make_fields()->create(data_get($this->form_data,'make_fields'));
            if($model){
                data_set($this->form_data, 'make_fields', []);
                /**
                 * Informação para o PHP session
                 */
                session()->flash('notification', ['text' => "Registro criado com sucesso!", 'variant'=>'success', 'time'=>3000, 'position'=>'right-top']);
                /**
                 * Informação em forma de evento para o java script
                 */
                $this->dispatchBrowserEvent('notification', ['text' => "Registro criado com sucesso!", 'variant'=>'success', 'time'=>3000, 'position'=>'right-top']);
                /**
                 * Atualizar informações em components interlidados
                 */
                $this->emit('refreshCreate', $model);

                return true;
            }
            else{
                 /**
                 * Informação para o PHP session
                 */
                session()->flash('notification', ['text' => "Não foi possivel finalizar a operação!", 'variant'=>'error', 'time'=>3000, 'position'=>'right-top']);
                /**
                 * Informação em forma de evento para o java script
                 */
                $this->dispatchBrowserEvent('notification', ['text' => "Não foi possivel finalizar a operação!", 'variant'=>'error', 'time'=>3000, 'position'=>'right-top']);
            return false;
            }
        } catch (\PDOException $PDOException) {
            $this->PDOException($PDOException, $callback);
            return false;
        }
    }

    protected function view($component= "-component")
    {
        return 'tall::admin.make.field.create-component';
    }
}
