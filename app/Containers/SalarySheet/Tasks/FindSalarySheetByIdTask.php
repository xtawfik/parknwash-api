<?php

namespace App\Containers\SalarySheet\Tasks;

use App\Containers\SalarySheet\Data\Repositories\SalarySheetRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindSalarySheetByIdTask extends Task
{

    protected $repository;

    public function __construct(SalarySheetRepository $repository)
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
