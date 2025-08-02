<?php

namespace App\Containers\MallStock\Tasks;

use App\Containers\MallStock\Data\Repositories\MallStockRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindMallStockByIdTask extends Task
{

    protected $repository;

    public function __construct(MallStockRepository $repository)
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
