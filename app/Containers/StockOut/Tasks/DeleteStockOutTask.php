<?php

namespace App\Containers\StockOut\Tasks;

use App\Containers\StockOut\Data\Repositories\StockOutRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteStockOutTask extends Task
{

    protected $repository;

    public function __construct(StockOutRepository $repository)
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
