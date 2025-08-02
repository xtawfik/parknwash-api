<?php

namespace App\Containers\AccPayslipItem\Tasks;

use App\Containers\AccPayslipItem\Data\Repositories\AccPayslipItemRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccPayslipItemByIdTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipItemRepository $repository)
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
