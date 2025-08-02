<?php

namespace App\Containers\AccPayslip\Tasks;

use App\Containers\AccPayslip\Data\Repositories\AccPayslipRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccPayslipTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

