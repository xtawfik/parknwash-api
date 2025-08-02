<?php

namespace App\Containers\AccPayslip\Tasks;

use App\Containers\AccPayslip\Data\Repositories\AccPayslipRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccPayslipTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipRepository $repository)
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
