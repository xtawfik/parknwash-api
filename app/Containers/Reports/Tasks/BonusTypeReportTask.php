<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\BonusType\Data\Repositories\BonusTypeRepository;
use App\Ship\Parents\Tasks\Task;

class BonusTypeReportTask extends Task
{

    protected $repository;

    public function __construct(BonusTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
