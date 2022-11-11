<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Settings\Apps;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;
use Tall\Orm\Http\Livewire\AbstractComponent;

class ListComponent extends AbstractComponent
{
    use AuthorizesRequests;

    public function mount()
    {
       $this->authorize(Route::currentRouteName());
        
    }

    
    public function view($compnent="-component")
    {
        return 'tall::admin.settings.apps.list-component';
    }
}
