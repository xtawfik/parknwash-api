<?php

namespace App\Containers\AccDivisionPlace\Tasks;

use App\Containers\AccDivisionPlace\Data\Repositories\AccDivisionPlaceRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccDivisionPlaceTask extends Task
{

    protected $repository;

    public function __construct(AccDivisionPlaceRepository $repository)
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
