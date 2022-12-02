<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Orm\Models\AbstractModel;
use Tall\Tenant\Concerns\UsesLandlordConnection;
use Tall\Tenant\Models\Landlord\Tenant;
use Tall\Theme\Contracts\IMenuSub;

class Menu extends AbstractModel
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

    // protected $with = ['items','sub_menus'];

    public function sub_menus()
    {
            return $this->belongsToMany(app(IMenuSub::class))
            ->when(isTenant(), function($builder){
                $builder->tenants(get_tenant_id());
            })
            ->whereNull('menu_subs.menu_sub_id')->limit(15);
    }
    

    public function items()
    {
            return $this->belongsToMany(app(IMenuSub::class))            
            ->when(isTenant(), function($builder){
                $builder->tenants(get_tenant_id());
            })->whereNotNull('menu_subs.menu_sub_id');
    }

     /**
     * Get the menu attributes.
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
