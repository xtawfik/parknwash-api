<?php

namespace App\Containers\Car\Tasks;

use App\Containers\Car\Data\Repositories\CarRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCarByIdTask extends Task
{

    protected $repository;

    public function __construct(CarRepository $repository)
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
