<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Mall\Data\Repositories\MallRepository;
use App\Ship\Parents\Tasks\Task;

class MallReportTask extends Task
{

    protected $repository;

    public function __construct(MallRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
