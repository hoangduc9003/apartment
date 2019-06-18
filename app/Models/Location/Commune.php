<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $table = 'communes';
    public $fillable = [
    	'dictrict_id', 
    	'name', 
    	'code'
    ];

   

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.commune.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id) {
            return '<a href="'.route('admin.commune.destroy', $this).'" data-toggle="tooltip" data-placement="top" data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'" 
                 title="'.__('buttons.general.crud.delete').'" class="btn btn-danger"><i class="fas fa-trash"></i></a>';
        }

        return '';
    }


    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {

        return '
    	<div class="btn-group" role="group" aria-label="'.__('labels.backend.commune.commune_actions').'">
		  '.$this->edit_button.'
		  '.$this->delete_button.'
		</div>';
    }
}
