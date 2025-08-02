<?php

namespace App\Containers\AccControlType\Tasks;

use App\Containers\AccControlType\Data\Repositories\AccControlTypeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccControlTypeTask extends Task
{

    protected $repository;

    public function __construct(AccControlTypeRepository $repository)
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
