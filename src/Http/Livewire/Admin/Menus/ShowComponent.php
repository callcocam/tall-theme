<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Menus;

use Tall\Orm\Http\Livewire\ShowComponent as LivewireShowComponent;

class ShowComponent extends LivewireShowComponent
{
    public function view($compnent="-component")
    {
        return 'admin.menus.show';
    }
}