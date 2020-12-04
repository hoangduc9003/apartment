<?php

namespace App\Models\Apartment;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owners';
    protected $fillable = [
        'user_id',
        'apartment_id',
    ];

    /**
     * @return mixed
     */
    public function apartments()
    {
        return $this->hasMany(Apartment::class, 'apartment_id','id');
    }


}
