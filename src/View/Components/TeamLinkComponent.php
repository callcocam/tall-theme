<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\View\Components;

use Illuminate\View\Component;
use Tall\Theme\Contracts\MenuSub;

class TeamLinkComponent extends Component
{

    protected $menu;
    protected $template;
    protected $classe = 'flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 ';
    protected $active = 'dark:bg-navy-600 bg-primary/10 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90';
    protected $deactive = 'dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(MenuSub $menu, $template="team-link",$classe=null, $active=null,$deactive=null)
    {
        $this->menu = $menu;

        $this->template = $template;
        if($classe)
            $this->classe = $classe;
        if($active)
            $this->active = $active;
        if($deactive)
            $this->deactive = $deactive;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(sprintf('tall::lnks.team-link-component', $this->template))
        ->with('classe',$this->classe)
        ->with('active',$this->active)
        ->with('deactive',$this->deactive)
        ->with('menu',$this->menu)
        ->with('routePrefix',request()->routeIs(sprintf("%s.*", data_get($this->menu, 'link'))))
        ->with('permission',$this->user()->hasTeamPermission($this->team(),data_get($this->menu, 'link')));
    }

    protected function user(){

        return auth()->user();
    }

    protected function team(){

        return $this->user()->currentTeam;
    }
}
