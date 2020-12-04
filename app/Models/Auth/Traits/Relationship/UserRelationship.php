<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Apartment\Apartment;
use App\Models\Apartment\Owner;
use App\Models\Auth\SocialAccount;
use App\Models\Auth\PasswordHistory;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }

    public function apartments(){
        return $this->belongsToMany(Apartment::class, Owner::class, 'user_id', 'apartment_id');
    }
}
