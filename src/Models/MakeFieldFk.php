<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Theme\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Orm\Models\AbstractModel;

class MakeFieldFk extends AbstractModel
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['make','make_model','make_field_foreign','make_field_local'];

    public function make()
    {
        if(class_exists('\\App\\Model\\Make')){
            return $this->belongsTo('\\App\\Model\\Make');
        }
        return $this->belongsTo(Make::class);
    }
    public function make_model()
    {
        if(class_exists('\\App\\Model\\Make')){
            return $this->belongsTo('\\App\\Model\\Make','make_model_id');
        }
        return $this->belongsTo(Make::class,'make_model_id');
    }
    public function make_field_foreign()
    {
        if(class_exists('\\App\\Model\\MakeField')){
            return $this->belongsTo('\\App\\Model\\MakeField', 'foreign_key_id');
        }
        return $this->belongsTo(MakeField::class, 'foreign_key_id');
    }
    public function make_field_local()
    {
        if(class_exists('\\App\\Model\\MakeField')){
            return $this->belongsTo('\\App\\Model\\MakeField','local_key_id');
        }
        return $this->belongsTo(MakeField::class,'local_key_id');
    }
    public function slugTo()
    {
        return false;
    }
}
