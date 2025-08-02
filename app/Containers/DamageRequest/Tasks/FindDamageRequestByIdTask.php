<?php

namespace App\Containers\DamageRequest\Tasks;

use App\Containers\DamageRequest\Data\Repositories\DamageRequestRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindDamageRequestByIdTask extends Task
{

    protected $repository;

    public function __construct(DamageRequestRepository $repository)
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
