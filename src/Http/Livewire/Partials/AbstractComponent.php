<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Partials;

use Tall\Orm\Http\Livewire\AbstractComponent as LivewireAbstractComponent;
use Tall\Theme\Main\SidebarPanel as MainSidebarPanel;

abstract class AbstractComponent extends LivewireAbstractComponent
{

    public $pageName;
    public $routePrefix;

    protected function layoutData(){

        return [];

    }
    
    protected function data(){

        return [
            'user'=> auth()->user(),
            'sidebarMenu'=>MainSidebarPanel::dashboards()
        ];

    }

    public function render()
    {
        return view($this->view())
        ->with($this->data());
    }
}
