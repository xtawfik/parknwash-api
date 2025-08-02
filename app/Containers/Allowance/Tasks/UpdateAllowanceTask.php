<?php

namespace App\Containers\Allowance\Tasks;

use App\Containers\Allowance\Data\Repositories\AllowanceRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAllowanceTask extends Task
{

    protected $repository;

    public function __construct(AllowanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

