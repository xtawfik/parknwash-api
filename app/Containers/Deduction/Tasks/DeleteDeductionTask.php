<?php

namespace App\Containers\Deduction\Tasks;

use App\Containers\Deduction\Data\Repositories\DeductionRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteDeductionTask extends Task
{

    protected $repository;

    public function __construct(DeductionRepository $repository)
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
