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
use Tall\Theme\Contracts\IStatus;

class Status extends AbstractModel implements IStatus
{
    use HasFactory, UsesLandlordConnection;
    
    
    protected $guarded = ['id'];
   
}