<?php

namespace App\Containers\AccClearedBalance\Tasks;

use App\Containers\AccClearedBalance\Data\Repositories\AccClearedBalanceRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccClearedBalanceTask extends Task
{

    protected $repository;

    public function __construct(AccClearedBalanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

