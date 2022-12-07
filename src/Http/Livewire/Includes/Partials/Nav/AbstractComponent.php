<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Includes\Partials\Nav;

use Livewire\Component;
use Illuminate\Support\Str;
use Tall\Theme\Contracts\IMenu;
use Tall\Theme\Contracts\IMenuSub;

abstract class AbstractComponent extends Component
{
    
    public $routePrefix;
    
   abstract public function view();

   protected function data()
   {
    $pageName = request()->route()->getName();
    $routePrefix = Str::replace('/','.',  request()->route()->getPrefix());
    // if (cache()->has($pageName)) {
    //     $current = cache()->get($pageName);
    // }
    // else{
        $current = app(IMenuSub::class)->where('link',$pageName )->whereNull('menu_sub_id')->first();
        if(!$current){
            $current = app(IMenuSub::class)->where('link',$pageName )->first();
                if($current  && $parent = $current->parent){
                    $current =$parent;
                }
        }
    //     cache()->put($pageName, $current);
    // }         
   
    
    $subMenus = data_get($current,'sub_menus');

    return [
        'routePrefix'=>$pageName,
        'pageName'=>$routePrefix,
        'current'=>$current,
        'subMenus'=>$subMenus,
        'sidebarMenu'=>$this->menus(config('theme.menus.site','menussite')),
    ];
   }

   public function menus($slug)
   {
        if (!cache()->has($slug)) {
            return cache()->get($slug);
        }
        else{
            if($menus = app(IMenu::class)->query()
            ->when(isTenant(), function($builder){
                $builder->tenants(get_tenant_id());
            })->whereSlug($slug)->first()){
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
