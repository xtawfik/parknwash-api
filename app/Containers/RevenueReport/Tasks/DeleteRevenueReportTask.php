<?php

namespace App\Containers\RevenueReport\Tasks;

use App\Containers\RevenueReport\Data\Repositories\RevenueReportRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteRevenueReportTask extends Task
{

    protected $repository;

    public function __construct(RevenueReportRepository $repository)
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
