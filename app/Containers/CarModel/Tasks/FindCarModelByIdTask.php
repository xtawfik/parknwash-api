<?php

namespace App\Containers\CarModel\Tasks;

use App\Containers\CarModel\Data\Repositories\CarModelRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCarModelByIdTask extends Task
{

    protected $repository;

    public function __construct(CarModelRepository $repository)
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
