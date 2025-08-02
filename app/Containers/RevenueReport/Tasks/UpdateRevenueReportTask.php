<?php

namespace App\Containers\RevenueReport\Tasks;

use App\Containers\RevenueReport\Data\Repositories\RevenueReportRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateRevenueReportTask extends Task
{

    protected $repository;

    public function __construct(RevenueReportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

