<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Settings\Apps;

use Tall\Orm\Http\Livewire\AbstractComponent;

class ListComponent extends AbstractComponent
{

    public function mount()
    {
    //    $pageName = request()->route()->getName();
    //    $routePrefix = request()->route()->getPrefix();
    // //    $routePrefix = Str::beforeLast("admin.posts.edit", '.');
       
    // $current = app(MenuSub::class)->where('link',$routePrefix )->whereNull('menu_sub_id')->first();
    //    dd($current,SidebarPanel::menus(config('theme.menus.admin','menu-admin'))->toArray(), $routePrefix);
    }

    
    public function view($compnent="-component")
    {
        return 'tall::admin.settings.apps.list-component';
    }
}
