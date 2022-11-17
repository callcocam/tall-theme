<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Orm\Models\AbstractModel;

class Menu extends AbstractModel
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

    protected $with = ['items','sub_menus'];

    public function sub_menus()
    {
        if(class_exists('\\App\\Models\\MenuSub')){
            return $this->belongsToMany('\\App\\Models\\MenuSub')->whereNull('menu_subs.menu_sub_id');
            //->whereNull('menu_subs.menu_sub_id');
        }
            return $this->belongsToMany(MenuSub::class)->whereNull('menu_subs.menu_sub_id');
    }

    public function items()
    {
        if(class_exists('\\App\\Models\\MenuSub')){
            return $this->belongsToMany('\\App\\Models\\MenuSub')->whereNotNull('menu_subs.menu_sub_id');
        }
            return $this->belongsToMany(MenuSub::class)->whereNotNull('menu_subs.menu_sub_id');
    }

     /**
     * Get the menu attributes.
     */
    public function menu_attribute()
    {
        return $this->morphOne(MenuAttribute::class, 'menu_attributeable');
    }
}
