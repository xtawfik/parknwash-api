<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Cover\Data\Repositories\CoverRepository;
use App\Ship\Parents\Tasks\Task;

class CoverReportTask extends Task
{

    protected $repository;

    public function __construct(CoverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
