<?php

namespace App\Containers\Partner\Tasks;

use App\Containers\Partner\Data\Repositories\PartnerRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllPartnersTask extends Task
{

    protected $repository;

    public function __construct(PartnerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
