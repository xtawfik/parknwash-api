<?php

namespace App\Containers\EmployeeDeductionType\Tasks;

use App\Containers\EmployeeDeductionType\Data\Repositories\EmployeeDeductionTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateEmployeeDeductionTypeTask extends Task
{

    protected $repository;

    public function __construct(EmployeeDeductionTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

