<?php

namespace App\Containers\Stock\Tasks;

use App\Containers\Stock\Data\Repositories\StockRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteStockTask extends Task
{

    protected $repository;

    public function __construct(StockRepository $repository)
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
