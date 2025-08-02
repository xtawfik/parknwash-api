<?php

namespace App\Containers\AccPlace\Tasks;

use App\Containers\AccPlace\Data\Repositories\AccPlaceRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccPlaceTask extends Task
{

    protected $repository;

    public function __construct(AccPlaceRepository $repository)
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
