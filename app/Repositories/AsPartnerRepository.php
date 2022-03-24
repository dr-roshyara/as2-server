<?php

namespace App\Repositories;

use App\Models\AsPartner;
use App\Models\Partner;
use AS2\PartnerRepositoryInterface;

class AsPartnerRepository implements PartnerRepositoryInterface
{
    
    
    private PartnerRepositoryInterface $asPartnerRepository;
    public function __construct(PartnerRepositoryInterface $asPartnerRepository)
    {
           $this->asPartnerRepository =$asPartnerRepository;
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
