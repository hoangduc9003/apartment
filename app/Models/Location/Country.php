<?php

namespace App\Models\Location;

use App\Models\Common\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Country extends BaseModel
{
    protected $table = 'countries';
    public $fillable = [
    	'name', 
    	'code', 
    	'two_letter_iso_code', 
    	'three_letter_iso_code', 
    	'nationality'
    ];

   

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.country.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id) {
            return '<a href="'.route('admin.country.destroy', $this).'" data-toggle="tooltip" data-placement="top" data-method="delete"
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
    	<div class="btn-group" role="group" aria-label="'.__('labels.backend.country.country_actions').'">
		  '.$this->edit_button.'
		  '.$this->delete_button.'
		</div>';
    }
}
