<?php

namespace App\Containers\AllowanceType\Tasks;

use App\Containers\AllowanceType\Data\Repositories\AllowanceTypeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAllowanceTypeTask extends Task
{

    protected $repository;

    public function __construct(AllowanceTypeRepository $repository)
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
