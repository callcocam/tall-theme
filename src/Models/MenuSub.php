<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Orm\Models\AbstractModel;
use Tall\Tenant\Concerns\UsesLandlordConnection;
use Tall\Tenant\Models\Landlord\Tenant;
use Tall\Theme\Contracts\IMenu;
use Tall\Theme\Contracts\IMenuSub;

class MenuSub extends AbstractModel implements IMenuSub
{
    use HasFactory, UsesLandlordConnection;
    
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

    // public function scopeParent(Builder $builder, $parent)
    // {
    //    $builder->where('menu_sub_id', $parent);
    // }

    public function sub_menus()
    {
        return $this->hasMany(app(IMenuSub::class));
    }

    public function parent()
    {
        return $this->belongsTo(app(IMenuSub::class),'menu_sub_id');
    }

    public function hasMenus()
    {
        return $this->belongsToMany(app(IMenu::class));
    }

    public function menus()
    {
        return $this->belongsToMany(app(IMenu::class));
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

    
    public function scopeTenants($query, $term)
    {
        return $query->whereHas('hasTenants', function ($builder) use ($term) {
            $builder->where('id', $term);
        });
    }

    public function hasTenants()
    {
        return $this->belongsToMany(Tenant::class)->withTimestamps();
    }
    
}
