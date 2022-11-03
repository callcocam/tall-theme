<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Orm\Models\AbstractModel;

class MenuSub extends AbstractModel
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    public function sub_menus()
    {
        if(class_exists('\\App\\Models\\Menu')){
            return $this->hasOne('\\App\\Models\\Menu');
        }
            return $this->hasOne(Menu::class);
    }

     /**
     * Get the menu subs attributes.
     */
    public function menu_attribute()
    {
        return $this->morphOne(MenuAttribute::class, 'menu_attributeable');
    }

}
