<?php

namespace App\Containers\AccPayslipEarning\Tasks;

use App\Containers\AccPayslipEarning\Data\Repositories\AccPayslipEarningRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccPayslipEarningByIdTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipEarningRepository $repository)
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
