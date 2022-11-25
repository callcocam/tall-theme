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

class MenuAttribute extends AbstractModel
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

      /**
     * Get the parent menu_attributeable model (Menu or Sub Menu).
     */
    public function menu_attributeable()
    {
        return $this->morphTo();
    }
}
