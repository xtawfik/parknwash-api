<?php

namespace App\Containers\ServiceType\Tasks;

use App\Containers\ServiceType\Data\Repositories\ServiceTypeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteServiceTypeTask extends Task
{

    protected $repository;

    public function __construct(ServiceTypeRepository $repository)
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
