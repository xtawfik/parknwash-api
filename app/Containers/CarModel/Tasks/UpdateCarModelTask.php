<?php

namespace App\Containers\CarModel\Tasks;

use App\Containers\CarModel\Data\Repositories\CarModelRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCarModelTask extends Task
{

    protected $repository;

    public function __construct(CarModelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);



        return $repository;
    }
}

