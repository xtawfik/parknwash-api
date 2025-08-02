<?php

namespace App\Containers\CarModel\Tasks;

use App\Containers\CarModel\Data\Repositories\CarModelRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCarModelTask extends Task
{

    protected $repository;

    public function __construct(CarModelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);



        return $repository;
    }
}

