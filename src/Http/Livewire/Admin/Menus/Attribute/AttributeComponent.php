<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Menus\Attribute;

use Tall\Orm\Http\Livewire\FormComponent;

class AttributeComponent extends FormComponent
{
    public function view($compnent="-component")
    {
        return 'tall::admin.menus.attribute.attribute-component';
    }
}
