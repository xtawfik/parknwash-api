<?php

namespace App\Containers\RevenueReport\Tasks;

use App\Containers\RevenueReport\Data\Repositories\RevenueReportRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindRevenueReportByIdTask extends Task
{

    protected $repository;

    public function __construct(RevenueReportRepository $repository)
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
