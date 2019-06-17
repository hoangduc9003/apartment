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
    public function apartment()
    {
        return $this->belongsTo(Apartment::class, 'apartment_id','id');
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
