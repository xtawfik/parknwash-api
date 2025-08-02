<?php

namespace App\Containers\Car\Tasks;

use App\Containers\Car\Data\Repositories\CarRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteCarTask extends Task
{

    protected $repository;

    public function __construct(CarRepository $repository)
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
