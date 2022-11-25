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
use Tall\Theme\Contracts\Menu;
use Tall\Theme\Contracts\MenuSub;

abstract class AbstractComponent extends Component
{
    
    public $routePrefix;
    
   abstract public function view();

   protected function data()
   {
    $pageName = request()->route()->getName();
    $routePrefix = Str::replace('/','.',  request()->route()->getPrefix());
    if (cache()->has($pageName)) {
        $current = cache()->get($pageName);
    }
    else{
        $current = app(MenuSub::class)->where('link',$pageName )->whereNull('menu_sub_id')->first();
        if(!$current){
            $current = app(MenuSub::class)->where('link',$pageName )->first();
                if($current  && $parent = $current->parent){
                    $current =$parent;
                }
        }
        cache()->put($pageName, $current);
    }         
   
    
    $subMenus = data_get($current,'sub_menus');

    return [
        'routePrefix'=>$pageName,
        'pageName'=>$routePrefix,
        'current'=>$current,
        'subMenus'=>$subMenus,
        'sidebarMenu'=>$this->menus(config('theme.menus.admin','menu-admin')),
    ];
   }

   public function menus($slug)
   {
        if (cache()->has($slug)) {
            return cache()->get($slug);
        }
        else{
            if($menus = app(Menu::class)->query()->whereSlug($slug)->first()){
                cache()->put($slug, $menus);
                return $menus;
            }
        }       
        return [];
   }

    public function render()
    {
        return view(sprintf("tall::%s-component", $this->view()))->with($this->data());
    }
}
