<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccInventoryPlace\Data\Repositories\AccInventoryPlaceRepository;
use App\Ship\Parents\Tasks\Task;

class AccInventoryPlaceReportTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryPlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
