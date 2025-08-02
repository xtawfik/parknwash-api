<?php

namespace App\Containers\MallSupply\Tasks;

use App\Containers\MallSupply\Data\Repositories\MallSupplyRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateMallSupplyTask extends Task
{

    protected $repository;

    public function __construct(MallSupplyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

