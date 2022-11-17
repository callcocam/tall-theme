<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Includes\Partials;;

use Livewire\Component;
use Tall\Theme\Main\SidebarPanel;
use Illuminate\Support\Str;
use Tall\Theme\Contracts\MenuSub;

abstract class AbstractComponent extends Component
{
    
    public $routePrefix;
    
   abstract public function view();

   protected function data()
   {
    $pageName = request()->route()->getName();
    $routePrefix = Str::replace('/','.',  request()->route()->getPrefix());
    $current = app(MenuSub::class)->where('link',$routePrefix )->whereNull('menu_sub_id')->first();

    return [
        'routePrefix'=>$pageName,
        'pageName'=>$routePrefix,
        'current'=>$current,
        'sidebarMenu'=>SidebarPanel::menus(config('theme.menus.admin','menu-admin')),
    ];
   }
    public function render()
    {
        return view(sprintf("tall::%s-component", $this->view()))->with($this->data());
    }
}
