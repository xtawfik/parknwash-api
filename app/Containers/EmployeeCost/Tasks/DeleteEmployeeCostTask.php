<?php

namespace App\Containers\EmployeeCost\Tasks;

use App\Containers\EmployeeCost\Data\Repositories\EmployeeCostRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteEmployeeCostTask extends Task
{

    protected $repository;

    public function __construct(EmployeeCostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
