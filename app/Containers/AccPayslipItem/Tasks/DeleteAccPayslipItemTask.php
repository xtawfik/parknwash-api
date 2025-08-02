<?php

namespace App\Containers\AccPayslipItem\Tasks;

use App\Containers\AccPayslipItem\Data\Repositories\AccPayslipItemRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccPayslipItemTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipItemRepository $repository)
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
