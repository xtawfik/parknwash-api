<?php

namespace App\Containers\AccEmployee\Tasks;

use App\Containers\AccEmployee\Data\Repositories\AccEmployeeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccEmployeeTask extends Task
{

    protected $repository;

    public function __construct(AccEmployeeRepository $repository)
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
