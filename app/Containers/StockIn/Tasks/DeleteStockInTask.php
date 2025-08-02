<?php

namespace App\Containers\StockIn\Tasks;

use App\Containers\StockIn\Data\Repositories\StockInRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteStockInTask extends Task
{

    protected $repository;

    public function __construct(StockInRepository $repository)
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
