<?php

namespace App\Containers\SupplyCategory\Tasks;

use App\Containers\SupplyCategory\Data\Repositories\SupplyCategoryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindSupplyCategoryByIdTask extends Task
{

    protected $repository;

    public function __construct(SupplyCategoryRepository $repository)
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
