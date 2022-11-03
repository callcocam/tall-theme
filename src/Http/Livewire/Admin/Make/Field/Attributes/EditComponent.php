<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Make\Field\Attributes;

use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Theme\Models\MakeFieldAttribute;

class EditComponent extends FormComponent
{
    
    public function mount(MakeFieldAttribute $model)
    {
        $this->setFormProperties($model);
        
    }
    
    protected function view($component= "-component")
    {
        return 'tall::admin.make.field.attributes.edit-component';
    }
}
