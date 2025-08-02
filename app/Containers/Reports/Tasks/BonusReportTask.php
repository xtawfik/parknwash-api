<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Bonus\Data\Repositories\BonusRepository;
use App\Ship\Parents\Tasks\Task;

class BonusReportTask extends Task
{

    protected $repository;

    public function __construct(BonusRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
