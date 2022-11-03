<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Partials\Sidebar;

use Tall\Theme\Http\Livewire\Partials\AbstractComponent;

class PanelComponent extends AbstractComponent
{
    protected function view($component= "-component")
    {
        return livewire('partials.sidebar.panel', $component);
    }
}
