<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Includes\Partials\Sidebar;

use Tall\Team\Contracts\IUser;
use Tall\Theme\Http\Livewire\Includes\Partials\AbstractComponent;

class UserComponent extends AbstractComponent
{
    public $user;

    public function mount(IUser $user)
    {
       $this->user = $user;
    }
    public function view()
    {
        return 'includes.partials.sidebar.user';
    }
}
