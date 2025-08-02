<?php

namespace App\Containers\AccClearedBalance\Tasks;

use App\Containers\AccClearedBalance\Data\Repositories\AccClearedBalanceRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccClearedBalanceByIdTask extends Task
{

    protected $repository;

    public function __construct(AccClearedBalanceRepository $repository)
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
