<?php

namespace App\Containers\AccPayslip\Tasks;

use App\Containers\AccPayslip\Data\Repositories\AccPayslipRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccPayslipByIdTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipRepository $repository)
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
