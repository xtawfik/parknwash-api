<?php

namespace App\Containers\SalarySheet\Tasks;

use App\Containers\SalarySheet\Data\Repositories\SalarySheetRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteSalarySheetTask extends Task
{

    protected $repository;

    public function __construct(SalarySheetRepository $repository)
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
