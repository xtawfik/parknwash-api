<?php

namespace App\Containers\Park\Tasks;

use App\Containers\Park\Data\Repositories\ParkRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateParkTask extends Task
{

    protected $repository;

    public function __construct(ParkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

