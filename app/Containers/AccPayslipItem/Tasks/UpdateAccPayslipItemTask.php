<?php

namespace App\Containers\AccPayslipItem\Tasks;

use App\Containers\AccPayslipItem\Data\Repositories\AccPayslipItemRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccPayslipItemTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

