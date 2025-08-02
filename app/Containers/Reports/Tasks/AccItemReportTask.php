<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccItem\Data\Repositories\AccItemRepository;
use App\Ship\Parents\Tasks\Task;

class AccItemReportTask extends Task
{

    protected $repository;

    public function __construct(AccItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
