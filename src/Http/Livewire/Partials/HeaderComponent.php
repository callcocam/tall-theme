<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Partials;

use Tall\Theme\Http\Livewire\Partials\AbstractComponent;

class HeaderComponent extends AbstractComponent
{
    protected function view($component= "-component")
    {
        return livewire('partials.header', $component);
    }
}
