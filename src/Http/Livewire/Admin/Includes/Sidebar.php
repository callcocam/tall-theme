<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Http\Livewire\Admin\Includes;

use Livewire\Component;
use Tall\Menus\Models\Menu;

class Sidebar extends Component
{

     /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount($model= 'admin')
    {
        
        $this->setFormProperties(Menu::query()->where('slug',$model)->first());

    }

     protected function menus(){
         if(class_exists('App\Helpers\LoadMenuHelper')){
              return app('App\Helpers\LoadMenuHelper')->menus();
         }
        return [];
     }

    public function render()
    {
        return view('theme::livewire.admin.includes.sidebar')->with('menus', $this->menus());
    }

    public function setFormProperties($model)
    {
        if($submenu = $model->sub_menu){
            foreach($submenu as $submenu){
                \Menu::create($model->slug, function($menu) use($submenu){
                    if($submenu->sub_menu->count()){                      
                        $this->dropdown($menu, $submenu);     
                    }
                    else{
                       $this->route($menu, $submenu);
                    }
                });
            }

        }
    }

    protected function route($menu, $item)
    {
        if($attribute = $item->attribute){
            $menu->route(data_get($attribute, 'route'), data_get($item, 'name'))
            ->model($item);
        }
    }
   
    protected function dropdown($menu, $submenu)
    {
            $menu->dropdown($submenu->name, 
                function ($sub) use($submenu) {    
                    foreach($submenu->sub_menu as $item){
                        if($item->sub_menu->count()){                      
                            $this->dropdown($sub, $item);  
                        }   
                        else{
                            $this->route($sub, $item);
                        }
                    }
                },[])
                ->order($submenu->order)
                ->model($submenu);             
    }
}
