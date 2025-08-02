<?php

namespace App\Containers\Allowance\Tasks;

use App\Containers\Allowance\Data\Repositories\AllowanceRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAllowanceTask extends Task
{

    protected $repository;

    public function __construct(AllowanceRepository $repository)
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
