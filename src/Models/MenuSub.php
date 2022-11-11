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
    protected $with = [
        'sub_menus'
    ];

    protected $appends = ['menus'];

    public function sub_menus()
    {
        if(class_exists('\\App\\Models\\MenuSub')){
            return $this->hasOne('\\App\\Models\\MenuSub');
        }
            return $this->hasOne(MenuSub::class);
    }

    public function menus()
    {
        if(class_exists('\\App\\Models\\Menu')){
            return $this->belongsToMany('\\App\\Models\\Menu');
        }
            return $this->belongsToMany(Menu::class);
    }


    public function getMenusAttribute()
    {
        return array_values($this->menus()->pluck('id','id')->toArray());
    }


     /**
     * Get the menu subs attributes.
     */
    public function menu_attribute()
    {
        return $this->morphOne(MenuAttribute::class, 'menu_attributeable');
    }

}
