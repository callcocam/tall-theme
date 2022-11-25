<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin;

use Tall\Theme\Http\Livewire\AbstractComponent;

class DashboardComponent extends AbstractComponent
{
    protected function view($component= "-component")
    {
        return 'tall::admin.dashboard-component';
    }
}
