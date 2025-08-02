<?php

namespace App\Containers\CustodyMovement\Tasks;

use App\Containers\CustodyMovement\Data\Repositories\CustodyMovementRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCustodyMovementsTask extends Task
{

    protected $repository;

    public function __construct(CustodyMovementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
