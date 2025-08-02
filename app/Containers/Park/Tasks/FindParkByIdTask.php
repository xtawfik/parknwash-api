<?php

namespace App\Containers\Park\Tasks;

use App\Containers\Park\Data\Repositories\ParkRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindParkByIdTask extends Task
{

    protected $repository;

    public function __construct(ParkRepository $repository)
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
