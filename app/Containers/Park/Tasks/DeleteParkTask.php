<?php

namespace App\Containers\Park\Tasks;

use App\Containers\Park\Data\Repositories\ParkRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteParkTask extends Task
{

    protected $repository;

    public function __construct(ParkRepository $repository)
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
