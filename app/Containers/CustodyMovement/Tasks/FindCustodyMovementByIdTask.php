<?php

namespace App\Containers\CustodyMovement\Tasks;

use App\Containers\CustodyMovement\Data\Repositories\CustodyMovementRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCustodyMovementByIdTask extends Task
{

    protected $repository;

    public function __construct(CustodyMovementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
