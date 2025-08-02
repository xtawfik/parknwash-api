<?php

namespace App\Containers\MallSupply\Tasks;

use App\Containers\MallSupply\Data\Repositories\MallSupplyRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindMallSupplyByIdTask extends Task
{

    protected $repository;

    public function __construct(MallSupplyRepository $repository)
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
