<?php

namespace App\Repositories;

use App\Models\AsPartner;
use AS2\PartnerRepositoryInterface;

class AsPartnerRepository implements PartnerRepositoryInterface
{
    
    
    private  $asPartner;
    public function __construct(AsPartner $asPartner)
    {
           $this->asPartner =$asPartner;
    }

    /**
     * @param  string  $id
     * @return Partner
     */
    public function findPartnerById($id)
    {
        return AsPartner::find($id);
    }
}
