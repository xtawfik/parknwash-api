<?php

namespace App\Containers\MallSupply\Tasks;

use App\Containers\MallSupply\Data\Repositories\MallSupplyRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateMallSupplyTask extends Task
{

    protected $repository;

    public function __construct(MallSupplyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

